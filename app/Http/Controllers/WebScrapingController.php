<?php

namespace App\Http\Controllers;

use App\Models\Argument;
use App\Models\Champion;
use App\Models\Item;
use App\Models\Sinergy;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class WebScrapingController extends Controller
{
    function itemsColect(){
        Item::truncate();
        $client = new Client();

        try {
            $response = $client->get('https://ddragon.leagueoflegends.com/cdn/13.14.1/data/en_US/item.json');

            $data = json_decode($response->getBody(), true);
            // dd($data);
            foreach ($data['data'] as $key => $item) {
               
                Item::create([
                    'id'            => $key,
                    'name'        => $item['name'],
                    'description' => $item['description'],
                    'plaintext'   => $item['plaintext'],
                    'image'       => json_encode($item['image']),
                    'into'        => !empty($item['into']) ? json_encode($item['into']) : '',
                    'stats'       => json_encode($item['stats']),
                    'gold'        => json_encode($item['gold']),
                    'name_esp'          => '',
                    'description_esp'   => '',
                    'plaintext_esp'     => '',
                ]);
            }
            $response = $client->get('https://ddragon.leagueoflegends.com/cdn/13.14.1/data/es_AR/item.json');

            $data = json_decode($response->getBody(), true);
            
            foreach ($data['data'] as $key => $item) {
                $itemBase = Item::find($key);
                $itemBase->update([
                    'name_esp'          => $item['name'],
                    'description_esp'   => $item['description'],
                    'plaintext_esp'     => $item['plaintext'],
                ]);
            }

            dd("done");
            return response()->json($data);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['error' => 'Error al llamar a la API'], 500);
        }
    }
    public function scrapeSinergy()
    {
        Sinergy::truncate();

        $url = 'https://www.metasrc.com/lol/arena/stats/duo'; // URL del sitio que deseas hacer scraping
        $client = new Client();
        $response = $client->get($url);
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);
        // Recorrer cada fila y extraer los datos
        $data = [];
       // Iterar sobre cada fila (tr) en la tabla
       $crawler->filter('tr._4g4aae')->each(function (Crawler $row, $rowIndex) use (&$data) {
        // Extraer los nombres de los campeones
        $championNames = [];
        $row->filter('td._byr3u7._fs7qiw.champ')->each(function (Crawler $cell) use (&$championNames) {
            $championNames[] = $cell->filter('span, a')->first()->text();
        });

        // Resto de datos de las celdas en la fila (ignorando span si es necesario)
        $rowData = $row->filter('td:not([hidden="hidden"])')->each(function (Crawler $cell, $cellIndex) {
            return $cell->text();
        });

        // Combinar los nombres de los campeones con el resto de los datos
        $rowData = array_merge($championNames, $rowData);

        // Agregar los datos de la fila al arreglo de datos
        $data[] = $rowData;
        });
        // dd( $data );
        foreach ($data as $key => $value) {
            $first_champ = str_replace("'", "", $value[0]);
            $first_champ = str_replace(".", "", $first_champ);

            // Verificar si el string contiene espacios
            if (strpos($first_champ, ' ') !== false) {
                // Si contiene espacios, eliminarlos y convertir a minúsculas
                $first_champ = str_replace(" ", "", $first_champ);
            }else{
                $first_champ =ucfirst(strtolower($first_champ));
            }

            $second_champ = str_replace("'", "", $value[1]);
            $second_champ = str_replace(".", "", $second_champ);
           
            if (strpos($second_champ, ' ') !== false) {
                // Si contiene espacios, eliminarlos y convertir a minúsculas
                $second_champ = str_replace(" ", "", $second_champ);
            }else{
                $second_champ =ucfirst(strtolower($second_champ));
            }
            
            $params = [
                'name'              => 'Synergy',
                'first_champ'       => $first_champ,
                'second_champ'      => $second_champ,
                'first_item'        => '',
                'second_item'       => '',
                'first_argument'    => '',
                'second_argument'   => '',
                'win'               => $value[6],
                'pick'              => $value[9],
                'status'            => '1',
                'tier'              => $value[4],
                'dificulty'         => '1',
                'first_name'        => $value[0],
                'second_name'       => $value[1],
            ];
    
            Sinergy::create($params);
        }
       dd("done");
    }
    function scrapArgument(){
        Argument::truncate();

        $url = 'https://www.metasrc.com/lol/arena/stats/augments'; // URL del sitio que deseas hacer scraping
        $client = new Client();
        $response = $client->get($url);
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);
      
          // Recorrer cada fila y extraer los datos
          $data = [];
          // Iterar sobre cada fila (tr) en la tabla
          $crawler->filter('tr._4g4aae')->each(function (Crawler $row, $rowIndex) use (&$data) {
            // Extraer los nombres de los campeones
            $championNames = [];
            $row->filter('td._byr3u7._fs7qiw.champ')->each(function (Crawler $cell) use (&$championNames) {
                $championNames[] = $cell->filter('span, a')->first()->text();
            });
    
            // Resto de datos de las celdas en la fila (ignorando span si es necesario)
            $rowData = $row->filter('td:not([hidden="hidden"])')->each(function (Crawler $cell, $cellIndex) {
                return $cell->text();
            });
            $row->filter('img')->each(function (Crawler $image, $imageIndex) use (&$rowData) {
                $rowData[] = $image->attr('data-src');
            });
    
            // Combinar los nombres de los campeones con el resto de los datos
            $rowData = array_merge($championNames, $rowData);
    
            // Agregar los datos de la fila al arreglo de datos
            $data[] = $rowData;
        });
        foreach ($data as $key => $value) {
            $tier='';
            switch ($value[3]) {
                case 'Good / A':
                    $tier = 'A';
                    break;
                case 'Fair / B':
                    $tier = 'B';
                    break;
                case 'Bad / D':
                    $tier = 'D';
                    break;
                case 'God / S+':
                    $tier = 'S+';
                    break;
                case 'Strong / S':
                    $tier = 'S';
                    break;
                case 'Weak / C':
                    $tier = 'C';
                    break;
                
                default:
                    $tier = 'C';
                    break;
            }
            $type='';
            switch ($value[2]) {
                case '8Prismatic':
                    $type = 'Prismatic';
                    break;
                case '4Gold':
                    $type = 'Gold';
                    break;
                case '0Silver':
                    $type = 'Silver';
                    break;
                default:
                    $type = '';
                    break;
            }
            $params = [
                'name' => $value[0],
                'type'  => $type,
                'tier'  => $tier,
                'pick'  => $value[4],
                'games'  => $value[5],
                'src'  => $value[6],
            ];
            Argument::create($params);
        }
        $archivoJson = base_path().'/arguments.json';

        // Leer el contenido del archivo JSON
        $jsonData = file_get_contents($archivoJson);

        // Decodificar el contenido JSON en un objeto o matriz PHP
        $data = json_decode($jsonData);

        foreach ($data as $key => $value) {
            $params = [
                'name_esp' => $value->NameEsp,
                'description' => $value->Effect,
                'description_esp' => $value->EffectEsp,
            ];
            $argument = Argument::where('name',$value->Name)->first();
            if($argument){
                $argument->update($params);
            }
        }

        dd('done');
    }
    function index(){
        return view('admin.pages.webScrapper');
    }
    function collectStatsData(Request $request){
        try {
            $url = "https://www.metasrc.com/lol/arena/stats";
            $client = new Client();
            $response = $client->get($url);
            $html = $response->getBody()->getContents();
    
            $crawler = new Crawler($html);
    
    
    
            // Recorrer cada fila y extraer los datos
            $data = [];
           // Iterar sobre cada fila (tr) en la tabla
           $crawler->filter('tr._4g4aae')->each(function (Crawler $row, $rowIndex) use (&$data) {
                // Extraer los nombres de los campeones
                $championNames = [];
                $row->filter('td._byr3u7._fs7qiw.champ')->each(function (Crawler $cell) use (&$championNames) {
                    $championNames[] = $cell->filter('span, a')->first()->text();
                });
        
                // Resto de datos de las celdas en la fila (ignorando span si es necesario)
                $rowData = $row->filter('td:not([hidden="hidden"])')->each(function (Crawler $cell, $cellIndex) {
                    return $cell->text();
                });
        
                // Combinar los nombres de los campeones con el resto de los datos
                $rowData = array_merge($championNames, $rowData);
        
                // Agregar los datos de la fila al arreglo de datos
                $data[] = $rowData;
            });

            foreach ($data as $key => $value) {
                $first_champ = str_replace("'", "", $value[0]);
                $first_champ = str_replace(".", "", $first_champ);

                // Verificar si el string contiene espacios
                if (strpos($first_champ, ' ') !== false) {
                    // Si contiene espacios, eliminarlos y convertir a minúsculas
                    $first_champ = str_replace(" ", "", $first_champ);
                }else{
                    $first_champ =ucfirst(strtolower($first_champ));
                }
                $tier='';
                switch ($value[4]) {
                    case 'Good / A':
                        $tier = 'A';
                        break;
                    case 'Fair / B':
                        $tier = 'B';
                        break;
                    case 'Bad / D':
                        $tier = 'D';
                        break;
                    case 'God / S+':
                        $tier = 'S+';
                        break;
                    case 'Strong / S':
                        $tier = 'S';
                        break;
                    case 'Weak / C':
                        $tier = 'C';
                        break;
                    
                    default:
                        $tier = 'C';
                        break;
                }
               $params = [
                'tier' => $tier,
                'win' => $value[7] ,
                'pick' => $value[10] ,
                'ban' => $value[11] ,
               ];
             
                $slug_name = $first_champ;

                if($slug_name == "RenataGlasc"){
                $slug_name = "Renata";
                }
                if($slug_name == "Wukong"){
                    $slug_name = "MonkeyKing";
                }
                $champion = Champion::where('slug_name',$slug_name)->first();
                if($champion){
                    $champion->update($params);
                }
            }
        
            dd("done");
            return response()->json($data);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['error' => 'Error al llamar a la API'], 500);
        }
    }
    function updateChampStats($name,$urlNanme) {
        if($urlNanme == "RenataGlasc"){
            $urlNanme = "renata";
        }
        if($urlNanme == "Wukong"){
            $urlNanme = "monkeyking";
        }
        $url = "https://app.mobalytics.gg/lol/champions/$urlNanme/arena-builds";
        $client = new Client();
        $response = $client->get($url);
        $html = $response->getBody()->getContents();
        $version = $this->lastVersion();

        $crawler = new Crawler($html);
    
        $data = [];
        $dataChampArgument = [];
        $best_duo = [];
        $itemsSituacional = [];
        $crawler->filter('.m-zrui0e')->each(function (Crawler $row, $rowIndex) use (&$data) {
            $championNames = [];
            
            $row->filter('img')->each(function (Crawler $image, $imageIndex) use (&$championNames) { // Corrected variable name here
                $championNames[] = $image->attr('alt'); // Corrected variable name here
            });
    
            $data[] = $championNames;
        });
        $crawler->filter('.m-rjxj80')->each(function (Crawler $row, $rowIndex) use (&$data) {
            $championNames = [];
            
            $row->filter('img')->each(function (Crawler $image, $imageIndex) use (&$championNames) { // Corrected variable name here
                $championNames[] = $image->attr('alt'); // Corrected variable name here
            });
    
            $data[] = $championNames;
        });

        // items situacionales
        $crawler->filter('.m-s76v8c')->each(function (Crawler $row, $rowIndex) use (&$itemsSituacional) {
            $items = [];
            
            $row->filter('img')->each(function (Crawler $image, $imageIndex) use (&$items) { // Corrected variable name here
                $items[] = $image->attr('alt'); // Corrected variable name here
            });
            $itemsSituacional = $items;
        });

        // mejores duos
        $crawler->filter('.m-1nhoed7')->each(function (Crawler $row, $rowIndex) use (&$best_duo ) {
            $duo = [];
            $row->filter('.ez6mgdl0')->each(function (Crawler $cell) use (&$duo) {
                $champ =  $cell->filter('.m-v1s0fv')->first()->text();
                $champ = Champion::where('name',$champ)->first();
                if($champ){
                    $duo[] = $champ->id;
                }
            });

            $best_duo = $duo;
        });
        
        $crawler->filter('.m-ue7o5o')->each(function (Crawler $row, $rowIndex) use (&$dataChampArgument) {
            $argumentChamp = [];
            
            $row->filter('img')->each(function (Crawler $image, $imageIndex) use (&$argumentChamp) { // Corrected variable name here
                $argumentChamp[] = $image->attr('alt'); // Corrected variable name here
            });
    
            $dataChampArgument[] = $argumentChamp;
        });


        $finalArrItem = [];
        $finalitemsSituacional = [];
        $finaldata = [];
        foreach ($data as $key => $value) {
            $finaldata[] = $value[0];
        }
        $data = array_unique($finaldata);

        foreach ($data as $key => $value) {
            $item = Item::where('name',$value)->first();

            $finalArrItem[] = [
                'type'  => '1',
                'id'  => $item->id,
                'name'  => $item->name,
                'description'  => $item->description,
                'description_esp'  => $item->description_esp,
                'stats'  => $item->stats,
                'gold'  => $item->gold,
                'image'  => "https://ddragon.leagueoflegends.com/cdn/$version/img/item/$item->id.png"
            ];
        }

        foreach ($itemsSituacional as $key => $value) {
            $item = Item::where('name',$value)->first();
            
            $finalitemsSituacional[] = [
                'type'  => '1',
                'id'  => $item->id,
                'name'  => $item->name,
                'description'  => $item->description,
                'description_esp'  => $item->description_esp,
                'stats'  => $item->stats,
                'gold'  => $item->gold,
                'image'  => "https://ddragon.leagueoflegends.com/cdn/$version/img/item/$item->id.png"
            ];
        }

        $finalArrArgument = [];
        $finaldataArgument = [];
        foreach ($dataChampArgument as $key => $value) {
            $finaldataArgument[] = $value[0];
        }
        $dataChampArgument = array_unique($finaldataArgument);

        foreach ($dataChampArgument as $key => $value) {
           
            $argument = Argument::where('name', $value)->first();
            if($argument){
                $finalArrArgument[] = $argument->id;
            }
        }



        $champion = Champion::where('slug_name',$name)->first();
        
        $params = [
            'build' => json_encode($finalArrItem),
            'argument' => json_encode($finalArrArgument),
            'best_duo' => json_encode($best_duo),
            'itemsSituacional' => json_encode($finalitemsSituacional),
        ];
        $champion->update($params);
        
        return;
        // dd([array_unique($finalArrArgument),array_unique($finalArrItem)]);
    }
    function collectDataChampion(){
        set_time_limit(0);
        $champions = Champion::all();
        foreach ($champions as $key => $champion) {
            $this->updateChampStats($champion->slug_name,$champion->slug_name);
        }
    }


    function championsColect(){
        Champion::truncate();
        $client = new Client();
        $version = $this->lastVersion();
      
        try {
            $response = $client->get("http://ddragon.leagueoflegends.com/cdn/$version/data/en_US/champion.json");

            $data = json_decode($response->getBody(), true);

            foreach ($data['data'] as $key => $champion) {
               
                Champion::create([
                    'name'              => $champion['name'],
                    'slug_name'         => $champion['id'],
                    'version'           => $champion['version'],
                    'key'               => $champion['key'],
                    'title'             => $champion['title'],
                    'info'              => json_encode($champion['info']),
                    'image'             => json_encode($champion['image']),
                    'tags'              => json_encode($champion['tags']),
                    'partype'           => $champion['partype'],
                    'stats'             => json_encode($champion['stats']),
                ]);
            }
            

            dd("done");
            return response()->json($data);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['error' => 'Error al llamar a la API'], 500);
        }
    }
    
    function lastVersion() {
        $allVerions = "https://ddragon.leagueoflegends.com/api/versions.json";
        $client = new Client();

        try {
            $response = $client->get($allVerions);

            $data = json_decode($response->getBody(), true);
            
            return $data[0];
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['error' => 'Error al llamar a la API'], 500);
        }
    }
    function test() {
        $url = 'https://www.metasrc.com/lol/arena/tier-list/augments'; // URL del sitio que deseas hacer scraping
        $client = new Client();
        $response = $client->get($url);
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);
        $data = [];
       
       $crawler->filter('div._ate82z')->each(function (Crawler $row, $rowIndex) use (&$data) {
        
            $championNames = [];
            $row->filter('div.augment-grid-item _yjo52')->each(function (Crawler $cell) use (&$championNames) {
                $championNames[] = $cell->filter('span, a')->first()->text();
            });

        });
 
       dd("done");
    }
}

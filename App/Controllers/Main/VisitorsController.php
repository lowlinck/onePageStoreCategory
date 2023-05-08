<?php
class VisitorsController {

public function index() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if($ip!=="127.0.0.1"){
        $country = $this->country($ip); 
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = $this->browsername($user_agent); 
        $visitors = new VisitorsModel();
        $lastVisitor = $visitors->getLastVisitor();
        if ($lastVisitor['ip'] !== $ip && time() - strtotime($lastVisitor['timestamp']) > 5 * 60) {
            $visitors->addVisitors($ip, $country, $browser);
        }
    }
   return "Это локальный сервер";
   

}

public function country($ip) {   

    // Формируем URL запроса к API GeoIP
    $url = "https://json.geoiplookup.io/".$ip;

    // Отправляем запрос и получаем ответ
     $response = file_get_contents($url);
  
    // Разбираем JSON-ответ
    $data = json_decode($response, true);

    // Возвращаем название страны
    return $data['country_name'];
}

public function browsername($user_agent) {
    ini_set('browscap', 'browscap.ini');
    $browser_info = get_browser($user_agent, true);
    $browser_name = $browser_info['browser'];
    return $browser_name;
}
}

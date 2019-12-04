


# How to Use 
| Domain | Method   | URI          | Name | Action  | Middleware |
|--|--|--|--|--|--|
|        | GET|HEAD | /            |      | Closure | web           |
|        | GET|HEAD | api/naruto   |      | Closure | api           |
|        | GET|HEAD | api/sasuke   |      | Closure | api,api.token |
|        | GET|HEAD | api/user     |      | Closure | api,auth:api  |
|        | GET|HEAD | apiv1/naruto |      | Closure | api           |
|        | GET|HEAD | apiv1/user   |      | Closure | api,auth:api  |



### Custom Middleware 
 - api.token : 
 **Using `token: 123asd123asd123` in header, curl php example :**


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "8000",
  CURLOPT_URL => "http://localhost:8000/api/sasuke",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Accept-Encoding: gzip, deflate",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "cache-control: no-cache",
    "token: 123asd123asd123"
  ),
));

`$response = curl_exec($curl);`
`echo $response;`
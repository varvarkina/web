<?php

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

$requestTime = $_SERVER['REQUEST_TIME'];

function createDBConnection(): mysqli {
	$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}

$method = $_SERVER['REQUEST_METHOD'];
echo 'Method: ' . $method . '<br>';

function getPostJson(): ?string {
  $dataAsJson = file_get_contents("php://input");
  if (!$dataAsJson) {
    echo 'Не удалось считать данные! <br>';
    return null;
  }
  return $dataAsJson;
}

function getPostJsonAsArray(string $dataAsJson): array {
  $dataAsArray = json_decode($dataAsJson, true);
  if (!$dataAsArray) {
    echo 'Не удалось преобразовать JSON в массив! <br>';
    return [];
  }
  return $dataAsArray;
}

if ($method == 'POST'){
    $dataAsJson = getPostJson();
    if ($dataAsJson) {
        print_r($dataAsJson . '<br>');
        print_r(getPostJsonAsArray($dataAsJson));
        echo '<br><br>'; 
    }
    if ($dataAsJson) {
      saveFile('data.json', $dataAsJson);
    }
    if ($dataAsJson) {
        $dataAsArray = getPostJsonAsArray($dataAsJson);
        if ($dataAsArray['image_url']) {
          $image_url = saveImage($dataAsArray['image_url'], $dataAsArray['title']);
        }
        if ($dataAsArray['author_url']) {
          $author_url = saveImage($dataAsArray['author_url'], $dataAsArray['author']);
        }
        $conn = createDBConnection();
        $sql = "INSERT INTO post (title, subtitle, content, author, author_url, publish_date, image_url, featured) 
                VALUES ('{$dataAsArray['title']}', '{$dataAsArray['subtitle']}', '{$dataAsArray['content']}', '{$dataAsArray['author']}', '{$author_url}', '{$_SERVER['REQUEST_TIME']}', '{$image_url}', '{$dataAsArray['featured']}')";
        $result = $conn->query($sql);  
    }
}
else {
echo 'choose POST';
} 

// 8. Сохраним JSON в файл
function saveFile(string $file, string $data): void {
  $myFile = fopen($file, 'w');
  if ($myFile) {
    $result = fwrite($myFile, $data);
    if ($result) {
      echo 'Данные успешно сохранены в файл <br>';
    } else {
      echo 'Произошла ошибка при сохранении данных в файл <br>';
    }
    fclose($myFile);
  } else {
    echo 'Произошла ошибка при открытии файла <br>';
  }
}

function saveImage(string $imageBase64, string $name): string {
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  saveFile("images/$name.{$imgExtention}", $imageDecoded);
  return "images/$name.{$imgExtention}";
}



?>
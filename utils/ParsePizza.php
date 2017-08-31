<?php

class ParsePizza
{
    /**
     * Example PizzaTempo
     * url = 'https://www.pizzatempo.by/menu/pizza.html';
     * url = 'https://www.pizzatempo.by/menu/pizza.html?paging=true&page=2';
     *
     * @param $url
     * @param $id
     * @return array
     */
    public function parseFromPizzaTempo($url, $id)
    {
        $doc = new DOMDocument();
        if (@$doc->loadHTML(file_get_contents($url))) {
            $container = $doc->getElementById($id);
            $image = $container->getElementsByTagName('img')->item(0);
            $src = $image->getAttribute('src');
            $name = $image->getAttribute('alt');
            $description = $this->getElementByClass($container, 'div', 'composition')->nodeValue;
            $array = array(
                'src' => $src,
                'name' => trim($name),
                'description' => trim($description)
            );
            return $array;
        }
    }

    /**
     *
     * Example PizzaMario
     * url = 'http://pizzamario.by/?network=g&placement=&position=none&match=&keyword=%D0%BF%D0%B8%D1%86%D1%86%D0%B0%20%D0%BC%D0%B8%D0%BD%D1%81%D0%BA&gclid=CjwKCAjwk4vMBRAgEiwA4ftLs3sBQohLjVZVveDmUKJXl2G-sgiWtfSyu3IlJgYmETZTqDJDT6EPMhoC7y8QAvD_BwE';
     *
     * @param $url
     * @param $itemNumber
     * @return array
     */
    public function parseFromPizzaMario($url, $itemNumber)
    {
        $doc = new DOMDocument();
        if (@$doc->loadHTML(file_get_contents($url))) {
            $container = $doc->getElementById('yoo-zoo');
            $image = $container->getElementsByTagName('img')->item($itemNumber);
            $src = $image->getAttribute('src');
            $name = $image->getAttribute('alt');
            $description = $container->getElementsByTagName('p')->item($itemNumber)->nodeValue;
            $array = array(
                'src' => $src,
                'name' => trim($name),
                'description' => trim($description)
            );
            return $array;
        }
    }

    /**
     * @param $parentNode
     * @param $tagName
     * @param $className
     * @param int $offset
     * @return bool
     */
    private function getElementByClass(&$parentNode, $tagName, $className, $offset = 0)
    {
        $response = false;

        $childNodeList = $parentNode->getElementsByTagName($tagName);
        $tagCount = 0;
        for ($i = 0; $i < $childNodeList->length; $i++) {
            $temp = $childNodeList->item($i);
            if (stripos($temp->getAttribute('class'), $className) !== false) {
                if ($tagCount == $offset) {
                    $response = $temp;
                    break;
                }

                $tagCount++;
            }

        }

        return $response;
    }
}
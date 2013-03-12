<?php  
namespace Szkolenie\MiastaBundle\DataFixtures\ORM;  

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;  
use Szkolenie\MiastaBundle\Entity\Song;  
use Szkolenie\MiastaBundle\Entity\Miasto;  
use dkacban1\ExampleMenuBundle\Entity\Menu;
use Symfony\Component\Yaml\Yaml;  
  
class LoadData implements FixtureInterface  
{  
    public function load(ObjectManager $manager)
    {  
  
        $yml = Yaml::parse('data/miasta.yml');  
        foreach ($yml as $m) {  
            $miasto = new Miasto();  
            $miasto->setNazwa($m['nazwa']);              
            $miasto->setMieszkancy($m['mieszkancy']);  
            $manager->persist($miasto);  
        }  
        
        $xml = simplexml_load_file('data/songs.xml');
        foreach($xml->song as $s) {
            $song = new Song();
            $song->setTitle($s->title);
            $song->setContents($s->contents);
            $manager->persist($song);
        }
        
        $ymlMenu= Yaml::parse('data/menu.yml');  
        foreach ($ymlMenu as $m) {  
            $menu = new Menu();  
            $menu->setTitle($m['title']);              
            $menu->setContents($m['contents']);  
            $manager->persist($menu);  
        }          
        
        $manager->flush();  
    }  
} 
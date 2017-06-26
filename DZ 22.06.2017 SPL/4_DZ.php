<?php

class LengthFilter extends \FilterIterator
{
    public $length;

    function __construct($iterator, $length)
    {
        parent::__construct($iterator);
        $this->length = $length;
    }

    public function accept()
    {
        return $this->getInnerIterator()
                ->current()
                ->getLength() >= $this->length;
    }
}

class Mp3Filter extends \FilterIterator
{
    public $format;

    function __construct($iterator)
    {
        parent::__construct($iterator);
        $this->format = "mp3";
    }

    public function accept()
    {
        return $this->getInnerIterator()
                ->current()
                ->getFormat() == $this->format;
    }
}

class Song
{
    private $length;
    private $name;
    private $format;
    private $date;
    private $artist;

    public function __construct($len, $name, $format, $artist)
    {
        $this->length = $len;
        $this->name = $name;
        $this->format = $format;
        $this->date = date("Y-m-d H:i:s");
        $this->artist = $artist;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getArtist()
    {
        return $this->artist;
    }
}

$myHeartWillGoOn = new Song(110, "My heart will go on", "mp3", "Celine Dion");
$lollipop = new Song(156, "Lollipop", "avi", "Mika");
$iWilAlwaysLoveYou = new Song(234, "I will always love you", "mp3", "Whitney Houston");
$showMustGoOn = new Song(200, "Show must go on", "mp3", "Qu4een");
$music = [$myHeartWillGoOn, $lollipop, $showMustGoOn, $iWilAlwaysLoveYou];

$musicList = new ArrayIterator($music);
$musicList = new LengthFilter($musicList, 120);
$musicList = new Mp3Filter($musicList);
//$musicList = new RegexIterator($musicList, "^\\D8&");  ?>

<table>
    <tr>
    <td>Name</td>
    <td>Format</td>
    <td>Length</td>
    <td>Artist</td>
    <td>Date</td>
    </tr>

    <?php foreach ($musicList as $item) : ?>

        <tr>
            <td>   <?= $item->getName(); ?> </td>
            <td>   <?= $item->getFormat(); ?> </td>
            <td>   <?= $item->getLength(); ?> </td>
            <td>   <?= $item->getArtist(); ?> </td>
            <td>   <?= $item->getDate(); ?> </td>


        </tr>
    <?php endforeach; ?>

</table>



<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Date</th>
<th>Ramadan</th>
<th>Fajr</th>
<th>Sunrise</th>
<th>Dhuhr</th>
<th>Asr</th>
<th>Maghrib</th>
<th>Isha</th>
</tr>
</thead>
<?php
$emsakia_start='2021-04-13';
$metho_names=array(
    0=>'Ithna Ashari',
    1=>'University of Islamic Sciences, Karachi',
    2=>'Islamic Society of North America (ISNA)',
    3=>'Muslim World League (MWL)',
    4=>'Umm al-Qura, Makkah',
    5=>'Egyptian General Authority of Survey',
    6=>'JAKIM & Sihat/Kemenag & Majlis Ugama Islam Singapura',
    7=>'Institute of Geophysics, University of Tehran',
    8=>'Union des Organisations Islamiques de France',
    9=>'Spiritual Administration of Muslims of Russia'
);
//var $Jafari     = 0;    // Ithna Ashari
//var $Karachi    = 1;    // University of Islamic Sciences, Karachi
//var $ISNA       = 2;    // Islamic Society of North America (ISNA)
//var $MWL        = 3;    // Muslim World League (MWL)
//var $Makkah     = 4;    // Umm al-Qura, Makkah
//var $Egypt      = 5;    // Egyptian General Authority of Survey
//var $Custom     = 6;    // JAKIM & Sihat/Kemenag & Majlis Ugama Islam Singapura
//var $Tehran     = 7;    // Institute of Geophysics, University of Tehran
//var $France     = 8;    // Union des Organisations Islamiques de France
//var $Russia     = 9;    // Spiritual Administration of Muslims of Russia
$calculation_method=4;
include('PrayTime.php');
$mons = array(1 => "يناير", 2 => "فبراير", 3 => "مارس", 4 => "ابريل", 5 => "مايو", 6 => "يونية", 7 => "يوليو", 8 => "اغسطس", 9 => "سبتمبر", 10 => "أكتوبر", 11 => "نوفمبر", 12 => "ديسمبر");
$days = array('Sat' => "السبت",'Sun' => "الاحد",'Mon' => "الاثنين",'Tue' => "الثلاثاء",'Wed' => "الاربعاء",'Thu' => "الخميس",'Fri' => "الجمعة");
$prayTime = new PrayTime($calculation_method);
$latitude='longitude.here';
$longitude='latitude.here';

for($i=0;$i<30;$i++)
{
    if($i>0)
        $dates[] = strtotime("+$i day", strtotime("$emsakia_start"));
    else
        $dates[] = strtotime($emsakia_start);
}
$R=1;
foreach($dates as $single_date)
{
    $times = $prayTime->getPrayerTimes($single_date, $latitude, $longitude, $timeZone);
    echo '<tr>
<td align="center">'.date('D d M Y',$single_date).'</td>
<td align="center">'.$R.' Ramadan</td>
<td align="center">'.date('h:i A',strtotime($times[0])).'</td>
<td align="center">'.date('h:i A',strtotime($times[1])).'</td>
<td align="center">'.date('h:i A',strtotime($times[2])).'</td>
<td align="center">'.date('h:i A',strtotime($times[3])).'</td>
<td align="center">'.date('h:i A',strtotime($times[5])).'</td>
<td align="center">'.date('h:i A',strtotime($times[6])).'</td>
</tr>';
    $R++;
}
?>
    </table>
    </div>

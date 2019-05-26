<?php

function tentang()
{
    $tentang=array('about-us'=>'About US','visi-misi'=>'Visi & Misi','tugas-wewenang'=>'Tugas & Wewenang','struktur-organisasi'=>'Struktur Organisasi');
    return $tentang;
}

function potongtext($text,$lebar)
{
    $txt=strip_tags($text);
    $txt=explode(' ',$txt);
    
    // return $txt;
    if($lebar>count($txt))
        return $text;
    else
    {
        $tx='';
        foreach($txt as $idx =>$v)
        {
            if($idx==$lebar)
                break;

            $tx.=$v.' ';
        }
        return $tx;
    }
}

function bulanIndo($bln,$singkat=null)
{
    if($singkat==null)
        $bulan=[1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'];
    else
        $bulan=[1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'Mei',6=>'Jun',7=>'Jul',8=>'Agu',9=>'Sept',10=>'Okt',11=>'Nov',12=>'Des'];

    return $bulan[$bln];
}

function tglIndo($date)
{
    $date=date('Y-n-d',strtotime($date));
    list($thn,$bln,$tgl)=explode('-',$date);
    return $tgl.'/'.bulanIndo($bln).'/'.$thn;
}
function tglIndoSingkat($date)
{
    $date=date('Y-n-d',strtotime($date));
    list($thn,$bln,$tgl)=explode('-',$date);
    return $tgl.'/'.bulanIndo($bln,true).'/'.$thn;
}
?>
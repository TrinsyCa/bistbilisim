<head>
    <style>
        .news
        {
            justify-content:center;
        }
        .haber_short
        {
            width: 345px;
            height: 225px;
        }
        .haber_short .pic
        {
            height: 180px;
        }
    </style>
</head>
<?php
    include("../../admin/connection.php");
    include("../../admin/linkfunc.php");
    //Kategori Takibi
    if($_GET)
    {
        $category = strtolower($_GET["category"]);
        if($category == "web")
        {
            $news = $db->query("SELECT * FROM news WHERE kategori = 'Web Programlama' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        }
        else if($category == "siber")
        {
            $news = $db->query("SELECT * FROM news WHERE kategori = 'Siber Güvenlik' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        }
        else if($category == "robotik")
        {
            $news = $db->query("SELECT * FROM news WHERE kategori = 'Robotik Kodlama' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        }
        else if($category == "ntp")
        {
            $news = $db->query("SELECT * FROM news WHERE kategori = 'Nesne Tabanlı Programlama' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        }
        else if($category == "grafik")
        {
            $news = $db->query("SELECT * FROM news WHERE kategori = 'Grafik ve Canlandırma' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        }
        else if($category == "genel")
        {
            $news = $db->query("SELECT * FROM news WHERE kategori = 'Genel' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        }
        else if($category == "duyuru")
        {
            $news = $db->query("SELECT * FROM news WHERE kategori = 'Duyuru' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        }
        else if($category == "btt")
        {
            $news = $db->query("SELECT * FROM news WHERE kategori = 'Bilişim Teknolojileri Temelleri' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    else
    {
        $news = $db->query("SELECT * FROM news ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
    if($news)
    {
        foreach($news as $row)
        {
            echo '<a href="p/'.$row["link"].'" class="haber_href">
                    <div class="haber haber_short">
                        <div class="pic">
                            <img src="../img/news/' . $row["resim"] . '">
                        </div>
                        <h3>'.kisalt($row["baslik"] , 50).'</h3>
                    </div>
                </a>
                ';
        }
    }
    else
    {
        if($_GET)
        {
            $category = strtolower($_GET["category"]);
            if($category == "web")
            {
                $category = "Web Programlama Haberi";
            }
            else if($category == "siber")
            {
                $category = "Siber Güvenlik Haberi";
            }
            else if($category == "robotik")
            {
                $category = "Robotik Kodlama Haberi";
            }
            else if($category == "ntp")
            {
                $category = "Nesne Tabanlı Programlama Haberi";
            }
            else if($category == "grafik")
            {
                $category = "Grafik ve Canlandırma Haberi";
            }
            else if($category == "genel")
            {
                $category = "Genel Haberler";
            }
            else if($category == "duyuru")
            {
                $category = "Duyuru Haberi";
            }
            else if($category == "btt")
            {
                $category = "Bilişim Teknoloji Temelleri Haberi";
            }
            echo $category." Bulunmuyor..";
        }
    }
?>
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
        if($news)
        {
            $l_news = $news[0];
        }
    }
    else
    {
        $news = $db->query("SELECT * FROM news ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        if($news)
        {
            $l_news = $news[0];
        }
    }
?>
<div class="news-2-side">
    <a href="p/<?php echo $l_news["link"]; ?>" target="_blank" class="haber_href">
        <div class="haber haber_long">
            <div class="pic">
                <?php echo empty($l_news["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $l_news["resim"] . '">'; ?>
            </div>
            <?php echo empty($l_news["baslik"]) ? "<h3></h3>" : '<h3 class="full">'.kisalt($l_news["baslik"] , 70).'</h3>'; ?>
        </div>
    </a>
    <div class="news">
        <a href="p/<?php echo $news[1]["link"]; ?>" target="_blank" class="haber_href">
            <div class="haber haber_short">
                <div class="pic">
                    <?php echo empty($news[1]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[1]["resim"] . '">'; ?>
                </div>
                <?php echo empty($news[1]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[1]["baslik"] , 50).'</h3>'; ?>
            </div>
        </a>
        <a href="p/<?php echo $news[2]["link"]; ?>" target="_blank" class="haber_href">
            <div class="haber haber_short">
                <div class="pic">
                    <?php echo empty($news[2]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[2]["resim"] . '">'; ?>
                </div>
                <?php echo empty($news[2]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[2]["baslik"] , 50).'</h3>'; ?>
            </div>
        </a>
        <a href="p/<?php echo $news[3]["link"]; ?>" target="_blank" class="haber_href">
            <div class="haber haber_short">
                <div class="pic">
                    <?php echo empty($news[3]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[3]["resim"] . '">'; ?>
                </div>
                <?php echo empty($news[3]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[3]["baslik"] , 26).'</h3>'; ?>
            </div>
        </a>
        <a href="p/<?php echo $news[4]["link"]; ?>" target="_blank" class="haber_href">
            <div class="haber haber_short">
                <div class="pic">
                    <?php echo empty($news[4]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[4]["resim"] . '">'; ?>
                </div>
                <?php echo empty($news[4]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[4]["baslik"] , 26).'</h3>'; ?>
            </div>
        </a>
    </div>
</div>
<a href="p/<?php echo $news[5]["link"]; ?>" target="_blank" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
            <?php echo empty($news[5]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[5]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[5]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[5]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="p/<?php echo $news[6]["link"]; ?>" target="_blank" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
            <?php echo empty($news[6]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[6]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[6]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[6]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="p/<?php echo $news[7]["link"]; ?>" target="_blank" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
            <?php echo empty($news[7]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[7]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[7]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[7]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
            <?php echo empty($news[8]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[8]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[8]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[8]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
            <?php echo empty($news[9]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[9]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[9]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[9]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
            <?php echo empty($news[10]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[10]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[10]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[10]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="" class="haber_href empty_news">
    <div class="haber haber_short">
    </div>
</a>
<div class="news-cube-side">
    <a href="" class="haber_href">
        <div class="haber haber_cube">
            <div class="pic">
            <?php echo empty($news[11]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[11]["resim"] . '">'; ?>
            </div>
            <?php echo empty($news[11]["baslik"]) ? "<h3></h3>" : '<h3 class="full">'.kisalt($news[11]["baslik"] , 90).'</h3>'; ?>
        </div>
    </a>
    <div class="news">
    <a href="" class="haber_href">
            <div class="haber haber_short">
                <div class="pic">
                    <?php echo empty($news[12]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[12]["resim"] . '">'; ?>
                </div>
                <?php echo empty($news[12]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[12]["baslik"] , 26).'</h3>'; ?>
            </div>
        </a>
        <a href="" class="haber_href">
            <div class="haber haber_short">
                <div class="pic">
                <?php echo empty($news[13]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[13]["resim"] . '">'; ?>
                </div>
                <?php echo empty($news[13]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[13]["baslik"] , 26).'</h3>'; ?>
            </div>
        </a>
        <a href="" class="haber_href">
            <div class="haber haber_short">
                <div class="pic">
                    <?php echo empty($news[14]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[14]["resim"] . '">'; ?>
                </div>
                <?php echo empty($news[14]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[14]["baslik"] , 26).'</h3>'; ?>
            </div>
        </a>
        <a href="" class="haber_href">
            <div class="haber haber_short">
                <div class="pic">
                <?php echo empty($news[15]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[15]["resim"] . '">'; ?>
                </div>
                <?php echo empty($news[15]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[15]["baslik"] , 26).'</h3>'; ?>
            </div>
        </a>
    </div>
</div>
<a href="" class="haber_href empty_news">
    <div class="haber haber_short">
    </div>
</a>
<a href="" class="haber_href empty_news">
    <div class="haber haber_short">
    </div>
</a>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
        <?php echo empty($news[16]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[16]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[16]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[16]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
        <?php echo empty($news[17]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[17]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[17]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[17]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
        <?php echo empty($news[18]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[18]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[18]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[18]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
        <?php echo empty($news[19]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[19]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[19]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[19]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<div class="news-add-side">
    <a href="" class="haber_href">
        <div class="ads" id="size_300x600">
            <div class="pic">
                <p><i class='fa-solid fa-x'></i></p>
            </div>
        </div>
    </a>
    <div class="news">
        <div class="news-cube-side">
            <a href="" class="haber_href">
                <div class="haber haber_cube">
                    <div class="pic">
                    <?php echo empty($news[20]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[20]["resim"] . '">'; ?>
                    </div>
                    <?php echo empty($news[20]["baslik"]) ? "<h3></h3>" : '<h3 class="full">'.kisalt($news[20]["baslik"] , 90).'</h3>'; ?>
                </div>
            </a>
        </div>
        <div class="news-w305">
            <a href="" class="haber_href">
                <div class="haber haber_short">
                    <div class="pic">
                    <?php echo empty($news[21]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[21]["resim"] . '">'; ?>
                    </div>
                    <?php echo empty($news[21]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[21]["baslik"] , 26).'</h3>'; ?>
                </div>
            </a>
            <a href="" class="haber_href">
                <div class="haber haber_short">
                    <div class="pic">
                    <?php echo empty($news[22]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[22]["resim"] . '">'; ?>
                    </div>
                    <?php echo empty($news[22]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[22]["baslik"] , 26).'</h3>'; ?>
                </div>
            </a>
            <a href="" class="haber_href">
                <div class="haber haber_short">
                    <div class="pic">
                    <?php echo empty($news[23]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[23]["resim"] . '">'; ?>
                    </div>
                    <?php echo empty($news[23]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[23]["baslik"] , 26).'</h3>'; ?>
                </div>
            </a>
        </div>
    </div>
</div>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
        <?php echo empty($news[24]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[24]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[24]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[24]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
        <?php echo empty($news[25]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[25]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[25]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[25]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
        <?php echo empty($news[26]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[26]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[26]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[26]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
<a href="" class="haber_href">
    <div class="haber haber_short">
        <div class="pic">
        <?php echo empty($news[27]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../img/news/' . $news[27]["resim"] . '">'; ?>
        </div>
        <?php echo empty($news[27]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[27]["baslik"] , 26).'</h3>'; ?>
    </div>
</a>
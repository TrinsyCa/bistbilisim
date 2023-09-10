<header class="swiper mySwiper">
    <div class="swiper-wrapper">
    <?php
        $verisliderdb = $db->prepare("SELECT * FROM news_slider ORDER BY id DESC");
        $verisliderdb->execute();
        $verislider = $verisliderdb->fetchAll(PDO::FETCH_ASSOC);

        if($_GET)
        {
            foreach($verislider as $row)
            {
                echo'<div class="swiper-slide"><img src="../../img/news/slider/'.$row["name"].'"></div>';
            }
            echo '
            </div>
                <div class="swiper-pagination"></div>
            </header>
            <div class="blue_line" id="sticky_blue_line">
                <div class="btns">
                    <a href="../"><i class="fa-solid fa-grip"></i><span>Tümü</span></a>
                    <a href="genel"><i class="fa-solid fa-newspaper"></i><span>Genel</span></a>
                    <a href="web"><i class="fa-solid fa-code"></i><span>Web</span></a>
                    <a href="grafik"><i class="fa-solid fa-images"></i><span>Grafik ve Canlandırma</span></a>
                    <a href="ntp"><i class="fa-solid fa-display"></i><span>NTP</span></a>
                    <a href="siber"><i class="fa-solid fa-shield"></i><span>Siber Güvenlik</span></a>
                    <a href="robotik"><i class="fa-solid fa-robot"></i><span>Robotik Kodlama</span></a>
                    <a href="btt"><i class="fa-solid fa-microchip"></i><span>BTT</span></a>
                    <a href="duyuru"><i class="fa-solid fa-bullhorn"></i><span>Duyuru</span></a>
                </div>
                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                    <div>';
                            $veri = $db->prepare("SELECT link , description FROM news LIMIT 15");
                            $veri->execute();
                            $verides = $veri->fetchAll(PDO::FETCH_ASSOC);
                            if($verides)
                            {
                                foreach($verides as $row)
                                {
                                    echo '<p>&nbsp;| <a href="../p/'.$row["link"].'">'.$row["description"].'</a> </p>';
                                }
                                echo '<p>&nbsp;| </p>';
                            }
                echo'</div>
                </marquee>
            </div>';
        }
        else
        {
            foreach($verislider as $row)
            {
                echo'<div class="swiper-slide"><img src="../img/news/slider/'.$row["name"].'"></div>';
            }
            echo '
            </div>
                <div class="swiper-pagination"></div>
            </header>
            <div class="blue_line" id="sticky_blue_line">
                <div class="btns">
                    <a href="./"><i class="fa-solid fa-grip"></i><span>Tümü</span></a>
                    <a href="c/genel"><i class="fa-solid fa-newspaper"></i><span>Genel</span></a>
                    <a href="c/web"><i class="fa-solid fa-code"></i><span>Web</span></a>
                    <a href="c/grafik"><i class="fa-solid fa-images"></i><span>Grafik ve Canlandırma</span></a>
                    <a href="c/ntp"><i class="fa-solid fa-display"></i><span>NTP</span></a>
                    <a href="c/siber"><i class="fa-solid fa-shield"></i><span>Siber Güvenlik</span></a>
                    <a href="c/robotik"><i class="fa-solid fa-robot"></i><span>Robotik Kodlama</span></a>
                    <a href="c/btt"><i class="fa-solid fa-microchip"></i><span>BTT</span></a>
                    <a href="c/duyuru"><i class="fa-solid fa-bullhorn"></i><span>Duyuru</span></a>
                </div>
                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                    <div>';
                            $veri = $db->prepare("SELECT link , description FROM news LIMIT 15");
                            $veri->execute();
                            $verides = $veri->fetchAll(PDO::FETCH_ASSOC);
                            if($verides)
                            {
                                foreach($verides as $row)
                                {
                                    echo '<p>&nbsp;| <a href="p/'.$row["link"].'">'.$row["description"].'</a> </p>';
                                }
                                echo '<p>&nbsp;| </p>';
                            }
                echo'</div>
                </marquee>
            </div>';
        }
    ?>
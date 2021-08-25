<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<!-- burda css in kütüphanesi olan bootstrapt ı kullandım. kutuları type göre boyamak için kullandım -->


<?php




/**
 * post.php
 *
 * Bu betik direk olarak erişilebilir. functions.php'de yaptığınız gibi bir
 * kontrol eklemenize gerek yok.
 *
 * > Dikkat: Bu dosya hem direk çalıştırılabilir hem de `posts.php` dosyasında
 * > 1+ kez içe aktarılmış olabilir.
 *
 * Bu betik dosyası içerisinde functions.php'de yer alan fonksiyonları da kullanarak
 * aşağıdaki işlemleri gerçekleştirmenizi bekliyoruz.
 *
 * - $id değişkeni yoksa "1" değeri ile tanımlanmalı, daha önceden bu değişken
 * tanımlanmışsa değeri değiştirilmemeli. (Kontrol etmek için `isset`
 * (https://www.php.net/manual/en/function.isset.php) kullanılabilir.)
 * - $id için yapılan işlemin aynısı $title ve $type için de yapılmalı. (İstediğiniz
 * değerleri verebilirsiniz)
 * - Bir sonraki adımda ilgili içerik gösterilmeden önce bir div oluşturulmalı ve
 * bu div $type değerine göre arkaplan rengi almalıdır. (urgent=kırmızı,
 * warning=sarı, normal=arkaplan yok)
 * - `getPostDetails` fonksiyonu tetiklenerek ilgili içeriğin çıktısı gösterilmeli.
 */

    include_once './functions.php';
    include_once './posts.php';

    // burda eğer id, title, type varsa duracak yoksa değiştirilecek

    if (isset($id)):
        $id = $id;
    else:
        $id = 3;
    endif;

    if (isset($title)):
        $title = $title;
    else:
        $title = "Aleyna Tilki - Sır";

    endif;

    if (isset($type)):
        $type = $type;
    else:
        $type = "urgent";

    endif;

    

    
    // burada tekli postu çekiyoruz

    $getLatestPosts = getLatestPosts($getRandomPostCount);

 ?> 



    <!-- burada bootstrap yardımı ile php de bir döngü başlatarak sırayla rekrana gösterdim -->


    <div class="container mt-5 mb-5 w-75">

        <h3 class="m-5">Toplam Görüntülenen post : <?= $getRandomPostCount; ?></h3>


        <?php foreach ($getLatestPosts as $key => $value): ?>


        <?php 

            switch ($value['type']) {
        case 'urgent':
            $class = 'bg-danger text-white';
            break;
        case 'warning':
            $class = 'bg-warning';
            break;
        case 'normal':
            $class = 'bg-light';
            break;
        
    }

        ?>

        <div class="row mt-3">
            <div class="card <?php echo $class; ?>">
                <span class="card-body text-center">
                    <?php 

                        getPostDetails($key, $value['title']);

                    ?>
                </span>
            </div>
        </div>

        <?php  endforeach; ?>


    </div>







<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    

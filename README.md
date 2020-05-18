# EAS Pemrograman Integratif
#### Agnes Lesmono 05311840000044
Membuat Website yang terhubung dengan database untuk menginput dan melihat data yang telah masuk dengan tema Sumbangan COVID-19. 
Secara sederhana, sistem dari website ini adalah :

> Halaman Home -> Formulir Sumbangan -> Menambahkan data Sumbangan -> Melihat list data dari sumbangan yang telah diinput sebelumnya

List data sumbangan tersebut dapat diakses pula melalui halaman home dan halaman formulir sumbang.

Tampilan halaman pertama jika mengakses `localhost/integratif/eas/public` adalah sebagai berikut :
![tampilan halaman pertama](https://github.com/lumbricina/EASIntegratif_05311840000044/blob/master/img/easpublic.PNG)

Dapat dilihat kata **Sumbang** dan **List Sumbangan** adalah hyperlink. Sumbang mengarah ke `localhost/integratif/eas/public/sumbangan/index` yang merupakan formulir untuk menambahkan data sumbangan, sedangkan List Sumbangan mengarah ke `localhost/integratif/eas/public/jenis` yang berisi tabel dari data sumbangan yang telah dimasukkan.
Berikut ini adalah tampilan dari formulir tersebut :
![tampilan formulir penambahan data](https://github.com/lumbricina/EASIntegratif_05311840000044/blob/master/img/sumbanganindex.PNG)

Setelah datanya terisi seperti berikut ini, 
![tampilan formulir terisi](https://github.com/lumbricina/EASIntegratif_05311840000044/blob/master/img/sumbanganindexfill.PNG)

klik tombol sumbangan dan data akan masuk ke database. Jika data masuk dengan baik, maka akan terlihat tampilan seperti berikut ini.
![data berhasil dimasukkan](https://github.com/lumbricina/EASIntegratif_05311840000044/blob/master/img/sumbangandataterinput.PNG)

Setelah data terinput, data tersebut dapat dilihat pada halaman List Sumbangan yang memiliki tampilan berikut ini
![enter image description here](https://github.com/lumbricina/EASIntegratif_05311840000044/blob/master/img/listsumbangan.PNG)

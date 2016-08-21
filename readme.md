#######################################

Alchemist
Laravel 5.2 Boilerplate,


วิธีใช้

สร้างไฟล์ .env ด้วยคำสั่ง cp .env.example .env

แก้ไขไฟล์ คอนฟิกดาต้าเบส



พิมพ์คำสั่ง

composer install --no-scripts

composer update


Plugin WIKI

[HTML Helper] https://laravelcollective.com/docs/5.2/html
[Theme] https://github.com/teepluss/laravel-theme

Develop by Nathawat.


#############################

How to Migration Database พี่จะไม่ให้ db เครื่อง dev นะ
cd เข้าไปโพลเดอร์งาน แล้วพิมพ์
php artisan migrate

ถ้าไม่ขึ้นไป config db ตาม user / pass localhost ของเธอนะ
แล้วลองพิมพ์ใหม่

Edit by Kunchai.

##############################

CLUB DATABASE SQL

INSERT INTO `club`(`club_id`, `club_name`, `club_secret_code`) VALUES
(1,"ชมรมอาสาพัฒนาชนบท","PN9CN"),
(2,"ชมรมอนุรักษ์ทรัพยากรฯ","ANR4K"),
(3,"ชมรมไฟฟ้าวิชาการ","E1E7C"),
(4,"ชมรม Formula Student","4MU1A"),
(5,"ชมรมธนบุรีโรบอทคอนเทส","RB1CT"),
(6,"ชมรมติว","TUECB"),
(7,"ชมรมอิเล็กทรอนิกส์บางมด","ELEBM"),
(8,"ชมรม 2B-KMUTT","2BKMTT"),
(9,"ชมรมพัฒนาเกมส์","DVGME"),
(10,"KMUTT - Entreprecnur Club","ENPCB"),
(11,"ชมรมศิลปวัฒนธรรมอีสาน","ESNCB"),
(12,"ชมรมพัฒนาศักยภาพฯ","PNSKP"),
(13,"ชมรมศิลปะและการถ่ายภาพ","SLQTP"),
(14,"ชมรมดนตรีไทยและนาฎศิลป์","MCSTH"),
(15,"ชมรมนักศึกษามุสลิม","MS1MJ"),
(16,"ชมรมบันเทิงและดนตรีสากล","MSC4F"),
(17,"ชมรมศิลปะฯล้านนา","LNN4L"),
(18,"ชมรมพุทธศาสตร์","BDS1H"),
(19,"ชมรมศิลปะฯทักษิณ","SHNT1"),
(20,"ชมรมแลกเปลี่ยนฯ","X9KSE"),
(21,"ชมรมสื่อสารมวลชนฯ","SNCN6"),
(22,"ชมรมศิลปะการ์ตูนฯ","CTN5R"),
(23,"ชมรม Cover dance","DNC3A"),
(24,"ชมรม ดาบสากล","KRNY1"),
(25,"ชมรมเทนนิส","TN1NS"),
(26,"ชมรมเปตอง","PT8NG"),
(27,"ชมรมรักบี้ฟุตบอล","RK3KB"),
(28,"ชมรมบาสเกตบอล","BSKBL"),
(29,"ชมรมเทเบิลเทนนิส","TBN3S"),
(30,"ชมรมเพาะกาย","EK1MS"),
(31,"ชมรมฟุตซอล","F1BLL"),
(32,"ชมรมสันทนาการและเชียร์","SNKN2"),
(33,"ชมรมเทควันโด","TBGD7"),
(34,"ชมรมคริสเตียน","CST3N"),
(35,"ชมรมวอลเล่ย์","VLL3B"),
(36,"ชมรมจักรยาน","BCLKE"),
(37,"ชมรมแบดมินตัน","BT1NT"),
(38,"ชมรม E-Sport","GESRT"),
(39,"ชมรมบริดจ์","BTC2Y"),
(40,"ชมรมฟุตบอล","FT3LL"),
(41,"KSIC","KS8IC"),
(42,"KMUTT Innovation","1TNNV"),
(43,"Alchemist","999"),
(44,"Student union","STDUN");

ก้อปใส่ SQL ใน MySQL ของน้องนะครับ

Editor Kunchai.

###################################

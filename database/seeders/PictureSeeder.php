<?php

namespace Database\Seeders;

use App\Models\Picture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pictures = [
            [
                'title' => 'Звёздная ночь',
                'description' => 'Одна из самых известных картин Винсента ван Гога, написанная в 1889 году. Картина изображает ночной пейзаж с яркими звёздами и спиралевидным небом.',
                'image_url' => 'https://picsum.photos/800/1000?random=1',
                'artist' => 'Винсент ван Гог',
                'year' => 1889,
                'category' => 'Постимпрессионизм',
                'price' => 150000.00,
                'technique' => 'Масло на холсте',
                'dimensions' => '73.7 x 92.1 см',
                'is_featured' => true,
            ],
            [
                'title' => 'Подсолнухи',
                'description' => 'Серия картин с подсолнухами, созданная ван Гогом в Арле. Яркие жёлтые цветы на синем фоне создают контрастное и жизнерадостное настроение.',
                'image_url' => 'https://picsum.photos/800/1000?random=2',
                'artist' => 'Винсент ван Гог',
                'year' => 1888,
                'category' => 'Постимпрессионизм',
                'price' => 120000.00,
                'technique' => 'Масло на холсте',
                'dimensions' => '92 x 73 см',
                'is_featured' => true,
            ],
            [
                'title' => 'Мона Лиза',
                'description' => 'Легендарный портрет, созданный Леонардо да Винчи. Загадочная улыбка Моны Лизы на протяжении веков вдохновляет художников и исследователей.',
                'image_url' => 'https://picsum.photos/800/1000?random=1',
                'artist' => 'Леонардо да Винчи',
                'year' => 1503,
                'category' => 'Ренессанс',
                'price' => 850000000.00,
                'technique' => 'Масло на тополевой доске',
                'dimensions' => '77 x 53 см',
                'is_featured' => true,
            ],
            [
                'title' => 'Водяные лилии',
                'description' => 'Серия картин Клода Моне, изображающих пруд с водяными лилиями в его саду в Живерни. Работы демонстрируют мастерство импрессиониста в передаче света и цвета.',
                'image_url' => 'https://picsum.photos/800/1000?random=3',
                'artist' => 'Клод Моне',
                'year' => 1919,
                'category' => 'Импрессионизм',
            ],
            [
                'title' => 'Танец',
                'description' => 'Картина Анри Матисса, изображающая фигуры людей в танце. Яркие цвета и упрощённые формы характерны для фовизма.',
                'image_url' => 'https://picsum.photos/800/1000?random=4',
                'artist' => 'Анри Матисс',
                'year' => 1910,
                'category' => 'Фовизм',
            ],
            [
                'title' => 'Крик',
                'description' => 'Одна из самых узнаваемых картин Эдварда Мунка. Выражает тревогу и отчаяние через искажённую фигуру на фоне яркого заката.',
                'image_url' => 'https://picsum.photos/800/1000?random=5',
                'artist' => 'Эдвард Мунк',
                'year' => 1893,
                'category' => 'Экспрессионизм',
            ],
            [
                'title' => 'Герника',
                'description' => 'Монументальная картина Пабло Пикассо, изображающая трагедию бомбардировки Герники. Символ антивоенного искусства.',
                'image_url' => 'https://picsum.photos/800/1000?random=6',
                'artist' => 'Пабло Пикассо',
                'year' => 1937,
                'category' => 'Кубизм',
            ],
            [
                'title' => 'Девушка с жемчужной серёжкой',
                'description' => 'Портрет работы Яна Вермеера, известный как "Северная Мона Лиза". Картина привлекает внимание загадочным взглядом девушки.',
                'image_url' => 'https://picsum.photos/800/1000?random=7',
                'artist' => 'Ян Вермеер',
                'year' => 1665,
                'category' => 'Барокко',
            ],
            [
                'title' => 'Ночное кафе',
                'description' => 'Картина ван Гога, изображающая интерьер кафе в Арле. Яркие цвета и экспрессивные мазки передают атмосферу ночного заведения.',
                'image_url' => 'https://picsum.photos/800/1000?random=8',
                'artist' => 'Винсент ван Гог',
                'year' => 1888,
                'category' => 'Постимпрессионизм',
            ],
            [
                'title' => 'Впечатление. Восходящее солнце',
                'description' => 'Картина Клода Моне, давшая название движению импрессионистов. Изображает гавань Гавра на рассвете.',
                'image_url' => 'https://picsum.photos/800/1000?random=9',
                'artist' => 'Клод Моне',
                'year' => 1872,
                'category' => 'Импрессионизм',
            ],
            [
                'title' => 'Постоянство памяти',
                'description' => 'Сюрреалистическая картина Сальвадора Дали с плавящимися часами. Одна из самых узнаваемых работ художника.',
                'image_url' => 'https://picsum.photos/800/1000?random=10',
                'artist' => 'Сальвадор Дали',
                'year' => 1931,
                'category' => 'Сюрреализм',
            ],
            [
                'title' => 'Чёрный квадрат',
                'description' => 'Икона супрематизма Казимира Малевича. Простота формы скрывает глубокий философский смысл.',
                'image_url' => 'https://picsum.photos/800/1000?random=11',
                'artist' => 'Казимир Малевич',
                'year' => 1915,
                'category' => 'Супрематизм',
            ],
        ];

        foreach ($pictures as $index => $picture) {
            $picture['price'] = $picture['price'] ?? rand(50000, 500000);
            $picture['technique'] = $picture['technique'] ?? 'Масло на холсте';
            $picture['dimensions'] = $picture['dimensions'] ?? rand(50, 150) . 'x' . rand(50, 150) . ' см';
            $picture['is_featured'] = $picture['is_featured'] ?? ($index < 3);
            
            Picture::create($picture);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sd_products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                
                'code'=>'ADIDASRUN1',
                'name'=> 'Adizero Adios Pro 3.0',
                'content'=>'Xác định tốc độ đua và duy trì cho tới vạch đích. Đôi giày chạy bộ adidas này có thiết kế đầy tốc độ với các thanh carbon ENERGYROD tạo độ cứng siêu nhẹ cho sải bước gọn ghẽ.',
                'price_regular'=>'6500000.00',
                'sale_price'=>'6500000.00',
                'discount'=>'0.00',
                'id_color'=>'1',
                'id_size'=>'1',
                'id_product_type'=>'1',
                'id_brand'=>'1',
                'id_gender'=>'1'
            ],
            [
                
                'code'=>'ADIDASRUN2',
                'name'=> 'X_PLRBOOST',
                'content'=>'Mang đến sự đa năng, thoải mái và phong cách cho mọi hành trình phiêu lưu.',
                'price_regular'=>'5000000.00',
                'sale_price'=>'5000000.00',
                'discount'=>'0.00',
                'id_color'=>'1',
                'id_size'=>'1',
                'id_product_type'=>'1',
                'id_brand'=>'1',
                'id_gender'=>'2'
            ],
            [
                
                'code'=>'ADIDASRUN3',
                'name'=> 'UltraBoost Light',
                'content'=>'Trải nghiệm nguồn năng lượng vượt trội với giày Ultraboost Light mới, phiên bản Ultraboost nhẹ nhất của chúng tôi.',
                'price_regular'=>'5200000.00',
                'sale_price'=>'5200000.00',
                'discount'=>'0.00',
                'id_color'=>'1',
                'id_size'=>'1',
                'id_product_type'=>'1',
                'id_brand'=>'1',
                'id_gender'=>'1'
            ],
            [
                
                'code'=>'ADIDASRUN4',
                'name'=> 'Adistar 2.0',
                'content'=>'Chạy bộ đường dài không chỉ đơn giản là di chuyển từ điểm đầu đến điểm cuối.',
                'price_regular'=>'3500000.00',
                'sale_price'=>'3500000.00',
                'discount'=>'0.00',
                'id_color'=>'1',
                'id_size'=>'1',
                'id_product_type'=>'1',
                'id_brand'=>'1',
                'id_gender'=>'2'
            ],
            [
                
                'code'=>'ADIDASRUN5',
                'name'=> 'Supernova 2.0',
                'content'=>'Từng bước một. Đó là cách bạn chạm tới vạch đích của giải đua đầu tiên.',
                'price_regular'=>'3200000.00',
                'sale_price'=>'3200000.00',
                'discount'=>'0.00',
                'id_color'=>'1',
                'id_size'=>'1',
                'id_product_type'=>'1',
                'id_brand'=>'1',
                'id_gender'=>'1'
            ],
            [
                
                'code'=>'NIKEJORDAN1',
                'name'=> 'Promo Exclusion',
                'content'=>'Lấy cảm hứng từ bản gốc ra mắt năm 1985, Air Jordan 1 Low mang đến vẻ ngoài cổ điển, sạch sẽ, quen thuộc nhưng luôn tươi mới.',
                'price_regular'=>'3200000.00',
                'sale_price'=>'3200000.00',
                'discount'=>'0.00',
                'id_color'=>'1',
                'id_size'=>'1',
                'id_product_type'=>'1',
                'id_brand'=>'2',
                'id_gender'=>'2'
            ],
            [
                
                'code'=>'NIKEJORDAN2',
                'name'=> 'Jordan Stadium 90',
                'content'=>'Thoải mái là vua, nhưng điều đó không có nghĩa là bạn phải hy sinh phong cách. Lấy cảm hứng thiết kế từ AJ1 và AJ5, Stadium 90 sẵn sàng cho trang phục hàng ngày.',
                'price_regular'=>'4100000.00',
                'sale_price'=>'4100000.00',
                'discount'=>'0.00',
                'id_color'=>'1',
                'id_size'=>'1',
                'id_product_type'=>'1',
                'id_brand'=>'2',
                'id_gender'=>'1'
            ],
            [
               
                'code'=>'AIRFORCE1',
                'name'=> 'Nike Air Force 1 07',
                'content'=>'Vẻ rạng rỡ vẫn tồn tại trong Air Force 1 07, biểu tượng b-ball mang đến một làn gió mới cho những gì bạn biết rõ nhất.',
                'price_regular'=>'3200000.00',
                'sale_price'=>'3200000.00',
                'discount'=>'0.00',
                'id_color'=>'1',
                'id_size'=>'1',
                'id_product_type'=>'1',
                'id_brand'=>'2',
                'id_gender'=>'1'
            ],
            [
                'code'=>'AIRFORCE2',
                'name'=> 'Nike Air Force 1 07 LX',
                'content'=>'Mang tình yêu của bạn cho trò chơi với bạn bất cứ nơi nào bạn đi. Vượt qua sự thoải mái của gỗ cứng với sự tinh tế ngoài sân đấu.',
                'price_regular'=>'3800000.00',
                'sale_price'=>'3800000.00',
                'discount'=>'0.00',
                'id_color'=>'1',
                'id_size'=>'1',
                'id_product_type'=>'1',
                'id_brand'=>'2',
                'id_gender'=>'2'
            ],
            [
                'code'=>'NIKEJORDAN4',
                'name'=> 'Nike Jordan 1 Mid',
                'content'=>'Air Jordan 1 Mid mang đến phong cách đầy đủ và sự thoải mái cao cấp cho một cái nhìn mang tính biểu tượng.',
                'price_regular'=>'3700000.00',
                'sale_price'=>'3700000.00',
                'discount'=>'0.00',
                'id_color'=>'1',
                'id_size'=>'1',
                'id_product_type'=>'1',
                'id_brand'=>'2',
                'id_gender'=>'2'
            ],
            ]);
    }
}

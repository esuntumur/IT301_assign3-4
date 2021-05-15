<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\admin;
use App\Models\content;
use App\Models\customer;
use App\Models\shop;
use App\Models\storage;
use App\Models\order;
use DateInterval;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class mailSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailSchedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send payment report mail to customers 1 day before due';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = order::where("renting", 1)->get();
        foreach ($orders as $order) {
            // shop info
            $shop = shop::where("id", $order['shopId'])->first();
            // content info
            $content = content::where("id", $order['contentId'])->first();
            // customer info
            $customer = customer::where("id", $order['customerId'])->first();
            // date calc
            $datetime1 = new DateTime($order['updated_at']);
            $datetime2 = new \DateTime('NOW');
            $days = $datetime1->diff($datetime2)->format('%a');
            // date returt date
            $returnDate = new DateTime($order['updated_at']);
            $returnDate->add(new DateInterval('P7D'));
            if ($days >= 6 || 1 == 1) {
                $data = [
                    'subject' => "Төлбөрийн нэхэмжлэл /Payment Invoice/",
                    'email' => "esontomorgantomor@gmail.com",
                    // хэзээ дуусах, түрээсийн үнэ, контентын нэр, тоо
                    'content' => "<p>Эрхэм хэрэглэгч " . $customer["name"] . " танд энэ өдрийн мэндийг хүргэе. Манай үйлчилгээг сонгон хэрэглэж байгаа танд баярлалаа.<br>/Dear customer " . $customer["name"] . " ,Thank you for choosing our service/</p>
                    <br>Таны бүртгэлийн дугаар /account ID/ :" . $customer["id"] . "
                    <br>Хамрагдах хугацаа /Period/ :" . $order["updated_at"] . " - " . $returnDate->format('Y-m-d H:i:s') . "
                    <br><br><b>ТӨЛБӨРИЙН ДЭЛГЭРЭНГҮЙ /BILL DETAIL/</b>
                    <br>Нийт төлбөр/Cycle bill/ :" . $order['orderPrice'] . "
                    <br> Та захиалсан контентоо " . $returnDate->format('Y-m-d H:i:s') . "-ны дотор буцаан өгнө үү./Return due time./ <br><p style='color: red;'>Оройтож буцаасан тохиолдолд контент бүрт хоногийн түрээсийн үнийн 10%-иар торгууль төлөх болохыг мэдэгдэе.<br>Please note that late returns will result in a 10% daily rental fee for each content.</p>
                    "

                ];

                Mail::send('auth.email-template', $data, function ($message) use ($data) {
                    $message->to($data['email'])
                        ->subject($data['subject']);
                });
            }
        }
    }
}
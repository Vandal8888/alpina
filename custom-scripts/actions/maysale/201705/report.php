<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

@set_time_limit(0);
ignore_user_abort(true);

CModule::IncludeModule("sale");
CModule::IncludeModule("iblock");
global $USER;
if ($USER->IsAdmin()){
$print_table = "<table width='100%'><tbody><tr>";
$print_table .= "
<td>Номер заказа</td>
<td>Цена без скидки</td>
<td>Цена со скидкой</td>
<td>Цена с доставкой</td>
<td>Стоимость доставки</td>
<td>Количество книг</td>
<td>Размер скидки (%)</td>
<td>Размер скидки (руб)</td>
</tr>
";

$books_table = "<table width='100%'><tbody><tr>";
$books_table .= "
<td>Заказ</td>
<td>Названия</td>
</tr>
";
$sale_books = array(
'begin',
8412,
8143,
7819,
8578,
8206,
7746,
8440,
8752,
60919,
8710,
8448,
8212,
6607,
8352,
8024,
8546,
7032,
7962,
60931,
8858,
8386,
8502,
8426,
7799,
7932,
67413,
7952,
60907,
8356,
75688,
67906,
60925,
8151,
69015,
7893,
67424,
89560,
8848,
7871,
8596,
69970,
7595,
8040,
8165,
8856,
8798,
);
	
$orders = array(
91938,
91937,
91936,
91935,
91934,
91933,
91932,
91931,
91930,
91929,
91928,
91926,
91925,
91923,
91922,
91921,
91920,
91919,
91918,
91916,
91915,
91914,
91912,
91911,
91910,
91908,
91907,
91906,
91905,
91903,
91901,
91900,
91899,
91898,
91896,
91895,
91893,
91892,
91891,
91890,
91889,
91888,
91887,
91886,
91884,
91883,
91882,
91881,
91880,
91878,
91877,
91876,
91874,
91873,
91872,
91870,
91869,
91868,
91867,
91866,
91865,
91863,
91862,
91861,
91860,
91859,
91857,
91856,
91855,
91854,
91853,
91851,
91850,
91849,
91848,
91847,
91846,
91845,
91844,
91843,
91842,
91841,
91840,
91839,
91837,
91836,
91835,
91834,
91830,
91829,
91827,
91825,
91824,
91823,
91822,
91821,
91820,
91819,
91816,
91814,
91813,
91812,
91811,
91810,
91809,
91808,
91806,
91805,
91804,
91803,
91801,
91800,
91798,
91797,
91796,
91794,
91793,
91792,
91790,
91789,
91788,
91785,
91784,
91783,
91782,
91779,
91778,
91777,
91775,
91773,
91772,
91771,
91769,
91768,
91767,
91766,
91765,
91764,
91763,
91762,
91761,
91760,
91759,
91758,
91757,
91756,
91755,
91751,
91750,
91749,
91748,
91747,
91744,
91743,
91740,
91738,
91736,
91735,
91734,
91732,
91730,
91729,
91728,
91727,
91726,
91724,
91722,
91721,
91719,
91718,
91717,
91716,
91715,
91714,
91712,
91711,
91710,
91709,
91706,
91703,
91702,
91700,
91699,
91697,
91696,
91693,
91692,
91691,
91690,
91688,
91687,
91686,
91685,
91684,
91683,
91679,
91678,
91677,
91675,
91673,
91672,
91671,
91670,
91669,
91668,
91667,
91664,
91662,
91661,
91660,
91659,
91656,
91655,
91653,
91652,
91651,
91650,
91648,
91647,
91646,
91644,
91643,
91642,
91641,
91640,
91639,
91638,
91636,
91634,
91631,
91630,
91629,
91628,
91627,
91626,
91625,
91624,
91623,
91622,
91621,
91620,
91619,
91618,
91617,
91615,
91613,
91610,
91609,
91608,
91604,
91603,
91602,
91601,
91599,
91598,
91597,
91596,
91595,
91594,
91592,
91591,
91590,
91589,
91588,
91587,
91586,
91584,
91580,
91579,
91577,
91575,
91574,
91569,
91568,
91566,
91565,
91564,
91563,
91561,
91560,
91559,
91558,
91557,
91556,
91555,
91554,
91553,
91552,
91551,
91550,
91548,
91546,
91545,
91544,
91542,
91541,
91539,
91537,
91536,
91535,
91533,
91532,
91531,
91530,
91529,
91528,
91524,
91523,
91517,
91516,
91515,
91513,
91511,
91510,
91509,
91508,
91507,
91506,
91505,
91504,
91503,
91502,
91501,
91500,
91499,
91498,
91497,
91495,
91494,
91492,
91491,
91490,
91489,
91488,
91487,
91486,
91485,
91484,
91482,
91481,
91480,
91479,
91477,
91475,
91473,
91472,
91471,
91470,
91468,
91467,
91466,
91465,
91464,
91461,
91460,
91459,
91457,
91456,
91453,
91452,
91451,
91450,
91449,
91448,
91447,
91446,
91444,
91443,
91442,
91441,
91439,
91438,
91437,
91435,
91433,
91432,
91431,
91430,
91429,
91427,
91426,
91425,
91424,
91423,
91422,
91420,
91419,
91418,
91417,
91416,
91415,
91413,
91412,
91410,
91409,
91408,
91406,
91405,
91404,
91402,
91399,
91398,
91397,
91396,
91395,
91394,
91392,
91390,
91389,
91388,
91387,
91386,
91385,
91384,
91383,
91380,
91375,
91374,
91373,
91372,
91371,
91368,
91366,
91364,
91360,
91359,
91358,
91357,
91356,
91355,
91354,
91353,
91352,
91350,
91349,
91348,
91347,
91346,
91344,
91343,
91342,
91340,
91336,
91333,
91332,
91331,
91330,
91329,
91328,
91327,
91326,
91325,
91324,
91323,
91322,
91321,
91320,
91319,
91318,
91316,
91315,
91314,
91313,
91312,
91307,
91305,
91304,
91302,
91301,
91299,
91298,
91297,
91296,
91295,
91294,
91293,
91292,
91291,
91290,
91289,
91288,
91287,
91286,
91283,
91282,
91280,
91279,
91276,
91275,
91274,
91273,
91272,
91271,
91269,
91268,
91267,
91266,
91265,
91264,
91263,
91262,
91261,
91260,
91259,
91258,
91257,
91256,
91255,
91254,
91253,
91252,
91251,
91247,
91246,
91245,
91244,
91242,
91239,
91238,
91237,
91235,
91234,
91233,
91230,
91228,
91227,
91226,
91225,
91224,
91223,
91222,
91221,
91220,
91219,
91217,
91215,
91214,
91213,
91211,
91210,
91208,
91207,
91205,
91204,
91203,
91201,
91200,
91199,
91197,
91196,
91195,
91193,
91192,
91191,
91190,
91189,
91187,
91186,
91185,
91184,
91182,
91181,
91180,
91178,
91174,
91173,
91172,
91171,
91170,
91169,
91168,
91164,
91163,
91162,
91161,
91160,
91159,
91158,
91157,
91156,
91155,
91153,
91151,
91150,
91149,
91148,
91147,
91146,
91144,
91143,
91141,
91139,
91138,
91136,
91135,
91134,
91133,
91132,
91130,
91128,
91127,
91125,
91124,
91123,
91122,
91121,
91116,
91114,
91113,
91111,
91110,
91109,
91108,
91106,
91104,
91102,
91101,
91100,
91099,
91098,
91097,
91096,
91095,
91094,
91093,
91092,
91091,
91090,
91089,
91088,
91087,
91086,
91084,
91081,
91080,
91079,
91078,
91076,
91074,
91073,
91072,
91069,
91068,
91067,
91063,
91061,
91058,
91057,
91056,
91054,
91053,
91052,
91051,
91049,
91048,
91045,
91044,
91043,
91042,
91041,
91040,
91039,
91036,
91034,
91033,
91032,
91031,
91030,
91029,
91028,
91026,
91025,
91023,
91022,
91021,
91020,
91018,
91016,
91015,
91014,
91013,
91012,
91011,
91010,
91009,
91008,
91006,
91005,
91004,
91003,
91002,
91001,
91000,
90999,
90998,
90997,
90996,
90995,
90994,
90993,
90992,
90991,
90990,
90989,
90988,
90987,
90985,
90984,
90983,
90982,
90981,
90980,
90979,
90978,
90977,
90976,
90975,
90974,
90973,
90972,
90970,
90969,
90968,
90967,
90966,
90964,
90963,
90962,
90961,
90960,
90958,
90957,
90956,
90955,
90953,
90952,
90951,
90950,
90949,
90948,
90945,
90944,
90943,
90942,
90941,
90940,
90939,
90936,
90935,
90933,
90932,
90931,
90930,
90929,
90927,
90926,
90925,
90924,
90923,
90922,
90921,
90920,
90919,
90918,
90917,
90916,
90915,
90914,
90913,
90912,
90911,
90910,
90909,
90908,
90907,
90905,
90904,
90903,
90902,
90901,
90900,
90899,
90898,
90897,
90896,
90895,
90894,
90893,
90891,
90890,
90888,
90887,
90886,
90884,
90883,
90881,
90880,
90878,
90877,
90876,
90875,
90874,
90873,
90872,
90871,
90870,
90869,
90868,
90866,
90865,
90864,
90863,
90862,
90861,
90860,
90859,
90858,
90857,
90856,
90854,
90853,
90852,
90851,
90850,
90849,
90848,
90847,
90846,
90845,
90844,
90843,
90842,
90841,
90839,
90838,
90837,
90836,
90835,
90834,
90833,
90832,
90831,
90830,
90829,
90828,
90827,
90826,
90825,
90824,
90823,
90821,
90820,
90819,
90818,
90817,
90816,
90815,
90814,
90813,
90812,
90811,
90810,
90809,
90808,
90807,
90806,
90805,
90804,
90803,
90802,
90801,
90800,
90799,
90798,
90797,
90796,
90795,
90794,
90793,
90792,
90790,
90789,
90788,
90787,
90786,
90785,
90784,
90783,
90782,
90781,
90780,
90779,
90777,
90776,
90775,
90774,
90773,
90772,
90771,
90770,
90769,
90768,
90767,
90766,
90765,
90764,
90763,
90762,
90761,
90760,
90759,
90758,
90756,
90754,
90753,
90752,
90751,
90749,
90747,
90744,
90743,
90742,
90741,
90740,
90739,
90737,
90736,
90735,
90734,
90733,
90732,
90730,
90729,
90728,
90727,
90726,
90725,
90724,
90723,
90722,
90721,
90720,
90719,
90718,
90717,
90716,
90715,
90714,
90713,
90712,
90711,
90710,
90709,
90708,
90707,
90706,
90704,
90703,
90702,
90701,
90700,
90699,
90698,
90697,
90696,
90695,
90694,
90693,
90692,
90691,
90690,
90688,
90687,
90686,
90685,
90683,
90682,
90681,
90680,
90679,
90678,
90677,
90676,
90674,
90673,
90672,
90671,
90670,
90669,
90668,
90667,
90666,
90665,
90664,
90663,
90662,
90661,
90659,
90658,
90657,
90656,
90655,
90654,
90653,
90652,
90651,
90650,
90649,
90648,
90647,
90646,
90645,
90644,
90643,
90642,
90640,
90639,
90638,
90637,
90636,
90635,
90634,
90633,
90632,
90631,
90630,
90629,
90628,
90625,
90622,
90620,
90619,
90618,
90617,
90616,
90615,
90614,
90612,
90611,
90609,
90608,
90607,
90606,
90605,
90604,
90603,
90602,
90601,
90600,
90598,
90597,
90596,
90595,
90594,
90592,
90591,
90590,
90589,
90587,
90586,
90585,
90584,
90583,
90582,
90581,
90576,
90575,
90574,
90573,
90572,
90571,
90570,
90569,
90568,
90566,
90565,
90563,
90559,
90556,
90555,
90554,
90553,
90552,
90551,
90550,
90548,
90546,
90545,
90544,
90543,
90542,
90541,
90540,
90537,
90536,
90535,
90531,
90528,
90527,
90524,
90523,
90522,
90521,
90518,
90516,
90515,
90514,
90513,
90512,
90510,
90509,
90508,
90506,
90504,
90503,
90502,
90501,
90500,
90499,
90498,
90497,
90495,
90494,
90493,
90492,
90491,
90490,
90489,
90482,
);

$final_old_price = 0;
$final_new_price = 0;
$final_wdelivery_price = 0;
$final_delivery_price = 0;
$final_quantity = 0;
$final_dicount_sum = 0;

$books = array();

foreach ($orders as $orderno) {
	$order = CSaleOrder::GetByID($orderno);
	$payed = false;
	
	if ($order[STATUS_ID] != 'D' && $order[STATUS_ID] != 'F' && $order[STATUS_ID] != 'I' && $order[STATUS_ID] != 'K')
		$payed = false;
	else
		$payed = true;

		
	$db_basket = CSaleBasket::GetList(($b="NAME"), ($o="ASC"), array("ORDER_ID"=>$orderno));


	$old_price = 0;
	$new_price = 0;
	$wdelivery_price = 0;
	$delivery_price = 0;
	$quantity = 0;
	
	
	$books_table .= "<tr><td>".$orderno."</td><td>";
	
	while ($ar_basket = $db_basket->Fetch())
	{

		$book_price = CCatalogProduct::GetByIDEx($ar_basket["PRODUCT_ID"]);
		$book_price = $book_price["PRICES"][11]['PRICE'];

		
		$quantity += $ar_basket["QUANTITY"];
		$new_price += DoubleVal($ar_basket["PRICE"])*IntVal($ar_basket["QUANTITY"]);
		
		$old_price += $book_price*IntVal($ar_basket["QUANTITY"]);
		if (array_search($ar_basket["PRODUCT_ID"], $sale_books)) { //Выбираем только акционные книги
			$books[$ar_basket["PRODUCT_ID"]]["ID"] = $ar_basket["PRODUCT_ID"];
			$books[$ar_basket["PRODUCT_ID"]]["NAME"] = $ar_basket["NAME"];
			$books[$ar_basket["PRODUCT_ID"]]["QUANTITY"] += $ar_basket["QUANTITY"];
			$books[$ar_basket["PRODUCT_ID"]]["NORMAL_PRICE"] = $book_price;
			$books[$ar_basket["PRODUCT_ID"]]["DISCOUNTED_SUM"] += $ar_basket["QUANTITY"] * $ar_basket["PRICE"];
			$books[$ar_basket["PRODUCT_ID"]]["DISCOUNTED_PRICE"] = $books[$ar_basket["PRODUCT_ID"]]["DISCOUNTED_SUM"]/$books[$ar_basket["PRODUCT_ID"]]["QUANTITY"];
			$books[$ar_basket["PRODUCT_ID"]]["ORDERS"] .= $orderno.',';
			
			if ($payed) {
				$books[$ar_basket["PRODUCT_ID"]]["QUANTITY_P"] += $ar_basket["QUANTITY"];
				$books[$ar_basket["PRODUCT_ID"]]["DISCOUNTED_SUM_P"] += $ar_basket["QUANTITY"] * $ar_basket["PRICE"];
				$books[$ar_basket["PRODUCT_ID"]]["DISCOUNTED_PRICE_P"] = $books[$ar_basket["PRODUCT_ID"]]["DISCOUNTED_SUM_P"]/$books[$ar_basket["PRODUCT_ID"]]["QUANTITY_P"];
				$books[$ar_basket["PRODUCT_ID"]]["ORDERS_P"] .= $orderno.',';	
			}
			
			$books_table .= $orderno."*".$ar_basket["NAME"]."*".$ar_basket["QUANTITY"]."*".$ar_basket["PRICE"]."*".$ar_basket["PRODUCT_ID"]."*".$ar_basket["DISCOUNT_VALUE"]."*".$book_price."<br />";
		}
	}

	$delivery_price = $order["PRICE"] - $new_price;
	if ($delivery_price < 1) {
		$delivery_price = 0;
	}

	$print_table .= "<tr>";
	$print_table .= "<td>".$orderno."</td>"; //Номер заказа
	$print_table .= "<td>".$old_price."</td>"; //Цена без скидки
	$print_table .= "<td>".$new_price."</td>"; //Цена со скидкой
	$print_table .= "<td>".$order["PRICE"]."</td>"; //Цена с доставкой
	$print_table .= "<td>".$delivery_price."</td>"; //Стоимость доставки
	$print_table .= "<td>".($quantity)."</td>"; //Количество книг
	$print_table .= "<td>".substr(((-$new_price/$old_price + 1)*100),0,2)."%</td>"; //Размер скидки %
	$print_table .= "<td>".($old_price - $new_price)."</td>"; //Размер скидки руб.
	
	$books_table .= "</td></tr>";
	
	$final_old_price += $old_price;
	$final_new_price += $new_price;
	$final_wdelivery_price += $order["PRICE"];
	$final_delivery_price += $delivery_price;
	$final_quantity += $quantity;
	$final_dicount_sum += ($old_price - $new_price);
	
	if ($payed) {
		$p_final_old_price += $old_price;
		$p_final_new_price += $new_price;
		$p_final_wdelivery_price += $order["PRICE"];
		$p_final_delivery_price += $delivery_price;
		$p_final_quantity += $quantity;
		$p_final_dicount_sum += ($old_price - $new_price);
	}

	$print_table .= "</tr>";
}

$print_table .= "<tr>
<td>Номер заказа</td>
<td>Цена без скидки</td>
<td>Цена со скидкой</td>
<td>Цена с доставкой</td>
<td>Стоимость доставки</td>
<td>Количество книг</td>
<td>Размер скидки (%)</td>
<td>Размер скидки (руб)</td>
</tr>
";

$print_table .= "<tr>
<td>ИТОГО заказано</td>
<td>".$final_old_price."</td>
<td>".$final_new_price."</td>
<td>".$final_wdelivery_price."</td>
<td>".$final_delivery_price."</td>
<td>".$final_quantity."</td>
<td>".substr((-$final_new_price/$final_old_price + 1),2,2)."%</td>
<td>".$final_dicount_sum."</td>
</tr>
";
$print_table .= "<tr>
<td>ИТОГО оплачено</td>
<td>".$p_final_old_price."</td>
<td>".$p_final_new_price."</td>
<td>".$p_final_wdelivery_price."</td>
<td>".$p_final_delivery_price."</td>
<td>".$p_final_quantity."</td>
<td>".substr((-$p_final_new_price/$p_final_old_price + 1),2,2)."%</td>
<td>".$p_final_dicount_sum."</td>
</tr>
";
$print_table .= "</tbody></table>";
$books_table .= "</tbody></table>";

echo $print_table;
//echo $books_table;


$books_table = '<table width="100%" border="1"><tbody><tr>';
$books_table .= "
<td>Название</td>
<td>Цена без скидки</td>
<td>Цена со скидкой</td>
<td>Итог со скидкой</td>
<td>Кол-во</td>
<td>Итог со скидкой</td>
<td>Кол-во</td>
<td>Скидка</td>
</tr>
";

foreach ($books as $book) {
	$books_table .= "<tr>
	<td>".$book["NAME"]."</td>
	<td>".$book["NORMAL_PRICE"]."</td>
	<td>".round($book["DISCOUNTED_PRICE"],1)."</td>
	<td>".$book["DISCOUNTED_SUM"]."</td>
	<td>".$book["QUANTITY"]."</td>
	<td>".$book["DISCOUNTED_SUM_P"]."</td>
	<td>".$book["QUANTITY_P"]."</td>
	<td>".substr((-$book["DISCOUNTED_PRICE"]/$book["NORMAL_PRICE"] + 1),2,2)."%</td>
	</tr>
	";
}
$books_table .= "</tbody></table>";

echo $books_table;

}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
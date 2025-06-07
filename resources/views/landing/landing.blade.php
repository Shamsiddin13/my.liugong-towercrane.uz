<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=480">
    <title><?php echo htmlspecialchars($landing->title)?></title>
    <base href="{{ url('https://my.liugong-towercrane.uz/l/') }}">
    <link rel="stylesheet" href="{{ asset('l/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('l/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('l/styles.css') }}">

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(102424019, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/102424019" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <style>

        /* Enhanced Color Button Swatches */
        .color-button {
            width: 45px;
            height: 45px;
            border: 2px solid #ddd;
            border-radius: 50%;
            margin: 8px;
            padding: 0;
            cursor: pointer;
            outline: none;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .color-button:hover {
            transform: scale(1.1);
            border-color: #666;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        .color-button.selected {
            border: 3px solid #000;
            box-shadow: 0 0 0 2px rgba(0,0,0,0.2), 0 4px 8px rgba(0,0,0,0.15);
        }

        .color-button::after {
            content: attr(data-color-name);
            position: absolute;
            bottom: -22px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            font-weight: 500;
            color: #333;
            white-space: nowrap;
        }

        /* Variant selection container */
        .variant-selection-container {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin: 15px auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border: 1px solid #e9ecef;
            max-width: 100%;
            width: 100%;
            box-sizing: border-box;
        }

        .variant-selection-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #333;
            text-align: center;
        }

        .variant-selection-subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Improved Size Select */
        #size-section label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }

        #size-select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #fff;
            appearance: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: all 0.2s ease;
        }

        #size-select:focus {
            border-color: #000;
            outline: none;
            box-shadow: 0 0 0 2px rgba(0,0,0,0.1);
        }

        /* Color options container */
        #color-options {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 5px;
            margin: 10px 0;
        }

        /* Your custom styles here */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        /* Error message styling */
        .error-message {
            display: block;
            color: #d9534f;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 4px;
            width: auto;
            max-width: 100%;
            box-sizing: border-box;
        }

        /* Input field styling */
        .field {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Form group styling */
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        /*Aksiya 2+1 promo style code*/
        .promo {
            padding: 0px 5px;
            font-weight: 700;
            font-size: 25px;
            line-height: 40px;
            text-align: center;
            background: #e43315;
            color: #fff;
            margin-bottom: 3px;
        }

        .offer_section.offer3 .price_block {
            margin: -23px 0 3px;
            padding: 0 60px;
            height: 80px;
            position: relative;
        }
        .promo_display {
        }
        .benefits_block {
            margin-top: 5px;
        }
        /* Yetkazib berish BEPUL Style */
        .free1-bor {
            margin: 0 0 5px;
            font-size: 22px;
            line-height: 28px;
            position: relative;
            z-index: 99;
        }

    </style>

    <!-- Meta Pixel Code -->
    @if (!empty($landingPost->pixel_id))
        <script>
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod ?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq) f._fbq=n;
                n.push=n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)
            }(window,document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php echo htmlspecialchars($landingPost->pixel_id)?>');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id=<?php echo htmlspecialchars($landingPost->pixel_id)?>&ev=PageView&noscript=1" />
        </noscript>
    @endif
    <!-- End Meta Pixel Code -->

</head>

<body>
<div class="main_wrapper">
    <header class="offer_section offer3">
        <h1 class="main_title"><?php echo htmlspecialchars($landing->title)?></h1>
        <div class="info_block">
            <p class="subtitle"><?php echo htmlspecialchars($landing->subtitle) ?></p>
            <img src="<?php echo htmlspecialchars(App\Models\Product::getImageUrl($landing->img1)) ?>" alt="Product Image">
        </div>
        <div class="price_block">
            <div class="price_item old">
                <div class="text">Yetkazib berish Toshkent Shahar ichida Bepul.</div>
            </div>

            <div class="price_item new">
                <div class="text"></div>
                <div class="value">
                    <span class="price_only7126">
                        {{ number_format($landing->product->sell_price ?? 0, 0, '.', ' ') }} $
                    </span>
                </div>
            </div>
        </div>

        @php
            // Check if any image exists
            $images = ['img2', 'img3', 'img4'];
            $hasImage = false;

            foreach ($images as $image) {
                if (!empty($landing->$image)) {
                    $hasImage = true;
                    break;
                }
            }
        @endphp

        <div class="benefits_block clearfix">
            @if ($hasImage)
                <div class="benefits_block clearfix">
                    @foreach ($images as $key => $image)
                        @if (!empty($landing->$image))
                            <div class="benefit_item">
                                <img src="<?php echo htmlspecialchars(App\Models\Product::getImageUrl($landing->$image)) ?>" alt="Benefit {{ $key + 1 }}">
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </header>
    <section class="use_section">
        <div style="text-align: center; padding: 7px 15px 15px 15px;">
            <p style="font-weight: 500; font-size: 18px;">
                <?php echo htmlspecialchars($landing->description) ?>
            </p>
        </div>
        <ul class="list2 marker1">
            <li><?php echo htmlspecialchars($landing->text1) ?></li>
            <li><?php echo htmlspecialchars($landing->text2) ?></li>
            @if (!empty($landing->text3))
                <li><?php echo htmlspecialchars($landing->text3) ?></li>
            @endif
            @if (!empty($landing->text4))
                <li><?php echo htmlspecialchars($landing->text4) ?></li>
            @endif
            @if (!empty($landing->text5))
                <li><?php echo htmlspecialchars($landing->text5) ?></li>
            @endif
            @if (!empty($landing->text6))
                <li><?php echo htmlspecialchars($landing->text6) ?></li>
            @endif
            <li>
                <b>
                    Yetkazib berish Toshkent Shahar ichida Bepul 🚚
                </b>
            </li>
        </ul>
    </section>
    <section class="offer_section offer3 order">
        @if (session('success'))
            <div class="alert alert-success" style="color: green; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        <form class="main-order-form order_form" id="order1" action="{{ route('landing.submit') }}" method="post">
            @csrf
            <input type="hidden" name="pixel_id" value="<?php echo htmlspecialchars($landingPost->pixel_id ?? ''); ?>">

            <select name="region" class="field" required title="'Ҳудудни танланг' bo'sh bo'lмаслиги керак.">
                <option disabled selected hidden>Ҳудудни танланг</option>
                <option value="Андижон">Андижон</option>
                <option value="Бухоро">Бухоро</option>
                <option value="Жиззах">Жиззах</option>
                <option value="Қорақалпоғистон">Қорақалпоғистон</option>
                <option value="Қашқадарё">Қашқадарё</option>
                <option value="Навоий">Навоий</option>
                <option value="Наманган">Наманган</option>
                <option value="Самарқанд">Самарқанд</option>
                <option value="Сурхандарё">Сурхандарё</option>
                <option value="Сирдарё">Сирдарё</option>
                <option value="Тошкент">Тошкент</option>
                <option value="Тошкент">Тошкент вилояти</option>
                <option value="Фарғона">Фарғона</option>
                <option value="Хоразм">Хоразм</option>
            </select>
            <div class="form-group">
                <label for="name" class="error-message"></label>
                <input class="field" type="text" id="name" name="name" placeholder="Ism va Familiya" value="">
            </div>
            <div class="form-group">
                <label for="phone" class="error-message"></label>
                <input class="field" type="tel" id="id_phone_number" name="phone" placeholder="Telefon raqam" value="">
            </div>
            <button class="button">Buyurtma berish</button>
        </form>
        <br>
    </section>
    <footer class="footer_section">
        <div style="margin:15px 0; text-align:center;">
            <span style="font-size: 22px; font-weight: bold;">Tezkor aloqa</span><br>
            <span style="font-size: 18px; font-weight: bold;">Telefon raqam: <a style="font-size: 15px;" href="tel:+998886366660">88 636 66 60</a></span><br>
            <span style="font-size: 18px; font-weight: bold;">Telegram: <a style="font-size: 15px;" href="https://t.me/KHASAN0916">@ZoomlionKran</a></span><br>
        </div>
    </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script src="{{asset('l/jquery.min.js')}}"></script>
<script src="{{asset('l/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        // Define allowed prefixes
        const allowedPrefixes = [
            '20', '33', '50', '71', '77', '78', '88', '89',
            '90', '91', '93', '94', '95', '97', '98', '99'
        ];

        // Apply input mask to the phone number field
        $('#id_phone_number').inputmask("+\\9\\98 (99) 999-99-99");

        // Clear error messages on input focus
        $("input, select").on("focus", function () {
            $(this).prev("label.error-message").html("");
        });

        // Clear error messages on page refresh
        $("input, select").each(function () {
            $(this).prev("label.error-message").html("");
        });

        // Restrict the name field to non-numeric values only
        $("#name").inputmask("Regex", { regex: "[^0-9]*" });

        // Add custom validator method for phone number completeness
        $.validator.addMethod(
            "phoneComplete",
            function (value, element) {
                return $(element).inputmask("isComplete");
            },
            "Telefon raqamingizni to'liq kiriting"
        );

        // Add custom validator for allowed prefixes
        $.validator.addMethod(
            "phonePrefix",
            function (value, element) {
                // Extract the unmasked value
                const rawPhone = $(element).inputmask("unmaskedvalue");
                const prefix = rawPhone.substring(0, 2); // Get the first two digits of the number
                return allowedPrefixes.includes(prefix); // Check if the prefix is allowed
            },
            "Operator kodi noto'g'ri"
        );

        // Initialize form validation
        $("#order1").validate({
            errorPlacement: function (error, element) {
                element.prev("label.error-message").html(error);
            },
            rules: {
                name: {
                    required: true,
                    minlength: 4,
                },
                phone: {
                    required: true,
                    phoneComplete: true,
                    phonePrefix: true, // Apply the prefix validation rule
                },
                region: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: `"Ism va Familiya" maydoni bo'sh bo'lmasligi kerak.`,
                    minlength: `"Ism va Familiya" майдонида камида 4 та белги бўлиши керак.`,
                },
                phone: {
                    required: `"Telefon raqam" maydoni bo'sh bo'lмаслиги керак.`,
                    phoneComplete: `Telefon raqamingizni to'liq kiriting.`,
                    phonePrefix: `"Telefon raqam" formati noto'g'ri.`,
                },
                region: {
                    required: `'Ҳудудни танланг' bo‘sh bo'lмаслиги керак.`,
                },
            },
            submitHandler: function (form) {
                // Process the phone number before submission
                const phoneInput = $('#id_phone_number');
                const rawPhoneNumber = phoneInput.inputmask('unmaskedvalue'); // Get the unmasked value
                phoneInput.val(rawPhoneNumber); // Set the unmasked value back to the input

                form.submit();
            }
        });
    });

</script>

</body>

</html>

@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="margin: 0 0 0 224px">
    <p style="margin-top: 18px" class="table_title"> STATISTICS </p>
    <!--<iframe id="notice" src="statistic/today.blade.php" ></iframe>-->
    <div>
        <button class="menu_button">
            <a class="link_in_button" style="color:#6868de;" target="display" href="statistic/sales">
                Daily
            </a>
        </button>
        <button class="menu_button">
            <a class="link_in_button" style="color:#6868de;" target="display" href="statistic/sales_monthly">
                Monthly
            </a>
        </button>
        <button class="menu_button">
            <a class="link_in_button" style="color:#6868de;" target="display" href="statistic/sales_yearly">
                Yearly
            </a>
        </button>
    </div>
    <div style="display: flex; justify-content: start">
        <iframe name = "display" style="margin: 0 0 0 0; width: 81%; height: 460px" src="statistic/sales" ></iframe>
        <iframe class="notification" src="statistic.today" ></iframe>
    </div>
    <div>

    </div>
    <iframe style="margin: 6px 0 0 0; width: 81%; height: 460px" src="statistic.status" ></iframe>
    <iframe style="margin: 0 0 0 0; width: 81%; height: 486px" src="statistic.product" ></iframe>

</section>



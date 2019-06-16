@extends('layouts.layout-cust')

@section ('content')

<script type="text/javascript">

    function incrementValue()
    {
        var value =  document.getElementById('price').value ;
        if(value < 550){
            value++;
        }
       

        document.getElementById('price').value =  value;
    }
   
    function minmax(value, min, max)
    {
        //set max price

        if(parseInt(value) < min || isNaN(parseInt(value)))
            return value;
        else if(parseInt(value) > max)
            return 2300;
        else return value;
    }
   
    //find the maximum dates
    function diff_minutes(dt2, dt1) 
         {
          var diff =(dt2.getTime() - dt1.getTime()) / 1000;
          diff /= 60;
          return Math.abs(Math.round(diff/60));          
         }

    function calculate_price()
    {
             
        var pages = Number(document.getElementById("page_num").value);

        var base_price = Number(15);       

        if($("#academic_level").val() == 'phd' )
        {
            base_price *= 4.0;
        }
        if($("#academic_level").val() == 'masters' )
        {
            base_price *= 3.5;
        }
        if($("#academic_level").val() == 'senior' )
        {
            base_price *= 3.0;
        }
        if($("#academic_level").val() == 'junior' )
        {
            base_price *= 2.5;
        }
        if($("#academic_level").val() == 'highschool' )
        {
            base_price *= 1.5;
        }
        if($("#academic_level").val()== 'other' )
        {
            base_price *= 1.2;
        }


        if(document.querySelector('input[name="urgency"]:checked').value == 'very_high' )
        {
            base_price += Number(4) *pages;
        }
        if(document.querySelector('input[name="urgency"]:checked').value == 'high' )
        {
            base_price += Number(3) *pages;
        }
        if(document.querySelector('input[name="urgency"]:checked').value == 'medium')
        {
            base_price += Number(2) *pages;
        }
        if(document.querySelector('input[name="urgency"]:checked').value == 'low' )
        {
            base_price += Number (1) *pages;
        }

       //single or double

        if(document.querySelector('input[name="spacing"]:checked').value == '2' )
        {
            base_price = base_price;
        }
        else 
        {
            base_price = 2 * base_price;
        }

        var date    = new Date(); 
        var value_deadline = 0;
        
        var end_date    =  new Date(document.getElementById('datetimepicker4').value);

        var diff = Math.round(diff_minutes(date, end_date));

        if(diff < 3)
        {
            base_price *=Number(1.6);
        }
        if(diff < 6) 
        {
            base_price *= Number(1.5)
        }
        if(diff < 24)
        {
            base_price *= Number(1.3)
        }
        if(diff < 36)
        {
            base_price *= Number(1.2)
        }
        else{
            base_price = base_price;
        }      

        document.getElementById("price").value = '$ '+ base_price;  

    }

    function tutor_price_calc()

    {
        var amount = 0;
        var pages = Number(document.getElementById("page_num").value);

        if(diff < 3)
        {
            amount = 5.5* pages
        }

         if(diff < 6)
        {
            amount = 5.0* pages
        }

         if(diff < 10)
        {
            amount = 4.5* pages
        }
         if(diff < 15)
        {
            amount = 4.0 * pages
        }
         if(diff < 20)
        {
            amount = 3.5* pages
        }
        else
        {
            amount = 3.0* pages
        }

        return amount;

    }


</script>

<section class="blog_area p_120">
            <div class="container">
                <div class="row">   
                <hr class="type_1">               
                    <div class="col-lg-3">

                        <div class="blog_right_sidebar">
                            
                            <aside class="single_sidebar_widget author_widget">
                                <img class="author_img img-fluid" src="{{ URL::asset('opium/img/blog/author.png ')}}" alt="">
                                <h4>Charlie Barber: User</h4>
                                <h5>5 Yrs of Tutoring</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-github"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                                <div class="br"></div>
                                <h4> Ksh. 244/569 </h4>

                                <div class="br"></div>
                            </aside>
                            
                            
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Tutor Menu</h4>
                                <ul class="list cat-list">
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Current</p>
                                            <p>7</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p> Bids</p>
                                            <p>6</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>For Revision</p>
                                            <p>4</p>
                                        </a>
                                    </li>                                    
                                    
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Completed</p>
                                            <p>8</p>
                                        </a>
                                    </li>
                                  
                                                                                                            
                                </ul>
                            </aside>
                        </div>
                    </div>
                      <div class="col-lg-9">
                        <div class="blog_left_sidebar">
                            <article class="blog_style1"; style="text-align": center;>
                                
                                <a class="logo" href="#"><img src="{{ URL::asset('opium/img/logo.png ')}}" alt=""></a>
                            </article>
                            <article class="blog_style1";">
                                
                                <div class="blog_text">
                                    <div class="blog_text_inner">
                                        <div class="cat">
                                            <a href="#" class="cat_btn"># 34546454</a>
                                            <a class="cat_btn" href="#">Category</a>
                                            <a class="cat_btn" href="#">Pages: 3 

                                            <i class="fa fa-calendar" aria-hidden="true"></i> 6hrs 4 min
                                            <i class="fa fa-money" aria-hidden="true"></i> 34  </a>
                                            <a href="#" class="cat_btn"><i class="fa fa-comments" aria-hidden="true"></i>4</a>
                                            
                                        </div>
                                    </div>
                 <form method="post" action="{{ route('CustPostQuestionPrice') }}" >

                	<input type="hidden" name="_token" value="{{ csrf_token() }}">

    

                        <div class="row">
                                                      <!--Panel-->
                            <div class="col-sm-12 text-left">
                                <div class="card">
                                    <div class="card-body">
                                                                        
		                          <div class="form-group row">
		                            <label for="password" class="col-md-4 card-title"><h3>{{ __('Formatting') }} </h3></label>

		                            <div class="col-md-6">
		                                <select id=""  name="paper_format" class="form-control">
		                                    <option selected="selected" value="1">APA</option>
		                                        <option value="MLA">MLA</option>
		                                        <option value="Turabian">Turabian</option>
		                                        <option value="Chicago">Chicago</option>
		                                        <option value="Harvard">Harvard</option>
		                                        <option value="Oxford">Oxford</option>
		                                        <option value="Vancouver">Vancouver</option>
		                                        <option value="CBE">CBE</option>
		                                        <option value="Other">Other</option>  
		                                </select> 
		                            </div>
		                        </div>
		                        <hr>

		                           <h3 class="card-title">Urgency</h3>
		                           <div class="row">
		                            <div class="col-md-6">
		                            	<div class="radio">
		                                <label><input type="radio" onchange="calculate_price()" id="urg" value="low" name="urgency"> Low</label>
		                                </div>
		                                <div class="radio">
		                                  <label><input type="radio" id="urg" onchange="calculate_price()" value="medium" name="urgency"> Medium</label>
		                                </div>
		                            </div>
		                                                                    
		                             <div class="col-md-6">
		                                <div class="radio">
		                                  <label><input type="radio" onchange="calculate_price()" id="urg" value="high" name="urgency"> High</label>
		                                </div>
		                                <div class="radio">
		                                  <label><input type="radio" onchange="calculate_price()" id="urg" value="very_high" name="urgency"> Very High</label>
		                                </div>
		                             </div>
		                         </div>

		                         <hr>
		                         
		                         	<div class="form-group row">
                                        <label class="col-md-4">Number of Pages </label>
                                        <div class="col-md-8"> 

                                            <select title="page_num" onchange="calculate_price()" id="page_num" class="form-control" name="pagenum">                                   
                                                	<option selected="selected" value="1">1 page/approx 275 words</option>
                                                    <option value="2">2 pages/approx 550 words</option>
                                                    <option value="3">3 pages/approx 825 words</option>
                                                    <option value="4">4 pages/approx 1100 words</option>
                                                    <option value="5">5 pages/approx 1375 words</option>
                                                    <option value="6">6 pages/approx 1650 words</option>
                                                    <option value="7">7 pages/approx 1925 words</option>
                                                    <option value="8">8 pages/approx 2200 words</option>
                                                    <option value="9">9 pages/approx 2475 words</option>
                                                    <option value="10">10 pages/approx 2750 words</option>
                                                    <option value="11">11 pages/approx 3025 words</option>
                                                    <option value="12">12 pages/approx 3300 words</option>
                                                    <option value="13">13 pages/approx 3575 words</option>
                                                    <option value="14">14 pages/approx 3850 words</option>
                                                    <option value="15">15 pages/approx 4125 words</option>
                                                    <option value="16">16 pages/approx 4400 words</option>
                                                    <option value="17">17 pages/approx 4675 words</option>
                                                    <option value="18">18 pages/approx 4950 words</option>
                                                    <option value="19">19 pages/approx 5225 words</option>
                                                    <option value="20">20 pages/approx 5500 words</option>
                                                    <option value="21">21 pages/approx 5775 words</option>
                                                    <option value="22">22 pages/approx 6050 words</option>
                                                    <option value="23">23 pages/approx 6325 words</option>
                                                    <option value="24">24 pages/approx 6600 words</option>
                                                    <option value="25">25 pages/approx 6875 words</option>
                                                    <option value="26">26 pages/approx 7150 words</option>
                                                    <option value="27">27 pages/approx 7425 words</option>
                                                    <option value="28">28 pages/approx 7700 words</option>
                                                    <option value="29">29 pages/approx 7975 words</option>
                                                    <option value="30">30 pages/approx 8250 words</option>
                                                    <option value="31">31 pages/approx 8525 words</option>
                                                    <option value="32">32 pages/approx 8800 words</option>
                                                    <option value="33">33 pages/approx 9075 words</option>
                                                    <option value="34">34 pages/approx 9350 words</option>
                                                    <option value="35">35 pages/approx 9625 words</option>
                                                    <option value="36">36 pages/approx 9900 words</option>
                                                    <option value="37">37 pages/approx 10175 words</option>
                                                    <option value="38">38 pages/approx 10450 words</option>
                                                    <option value="39">39 pages/approx 10725 words</option>
                                                    <option value="40">40 pages/approx 11000 words</option>
                                                    <option value="41">41 pages/approx 11275 words</option>
                                                    <option value="42">42 pages/approx 11550 words</option>
                                                    <option value="43">43 pages/approx 11825 words</option>
                                                    <option value="44">44 pages/approx 12100 words</option>
                                                    <option value="45">45 pages/approx 12375 words</option>
                                                    <option value="46">46 pages/approx 12650 words</option>
                                                    <option value="47">47 pages/approx 12925 words</option>
                                                    <option value="48">48 pages/approx 13200 words</option>
                                                    <option value="49">49 pages/approx 13475 words</option>
                                                    <option value="50">50 pages/approx 13750 words</option>
                                                    <option value="51">51 pages/approx 14025 words</option>
                                                    <option value="52">52 pages/approx 14300 words</option>
                                                    <option value="53">53 pages/approx 14575 words</option>
                                                    <option value="54">54 pages/approx 14850 words</option>
                                                    <option value="55">55 pages/approx 15125 words</option>
                                                    <option value="56">56 pages/approx 15400 words</option>
                                                    <option value="57">57 pages/approx 15675 words</option>
                                                    <option value="58">58 pages/approx 15950 words</option>
                                                    <option value="59">59 pages/approx 16225 words</option>
                                                    <option value="60">60 pages/approx 16500 words</option>
                                                    <option value="61">61 pages/approx 16775 words</option>
                                                    <option value="62">62 pages/approx 17050 words</option>
                                                    <option value="63">63 pages/approx 17325 words</option>
                                                    <option value="64">64 pages/approx 17600 words</option>
                                                    <option value="65">65 pages/approx 17875 words</option>
                                                    <option value="66">66 pages/approx 18150 words</option>
                                                    <option value="67">67 pages/approx 18425 words</option>
                                                    <option value="68">68 pages/approx 18700 words</option>
                                                    <option value="69">69 pages/approx 18975 words</option>
                                                    <option value="70">70 pages/approx 19250 words</option>
                                                    <option value="71">71 pages/approx 19525 words</option>
                                                    <option value="72">72 pages/approx 19800 words</option>
                                                    <option value="73">73 pages/approx 20075 words</option>
                                                    <option value="74">74 pages/approx 20350 words</option>
                                                    <option value="75">75 pages/approx 20625 words</option>
                                                    <option value="76">76 pages/approx 20900 words</option>
                                                    <option value="77">77 pages/approx 21175 words</option>
                                                    <option value="78">78 pages/approx 21450 words</option>
                                                    <option value="79">79 pages/approx 21725 words</option>
                                                    <option value="80">80 pages/approx 22000 words</option>
                                                    <option value="81">81 pages/approx 22275 words</option>
                                                    <option value="82">82 pages/approx 22550 words</option>
                                                    <option value="83">83 pages/approx 22825 words</option>
                                                    <option value="84">84 pages/approx 23100 words</option>
                                                    <option value="85">85 pages/approx 23375 words</option>
                                                    <option value="86">86 pages/approx 23650 words</option>
                                                    <option value="87">87 pages/approx 23925 words</option>
                                                    <option value="88">88 pages/approx 24200 words</option>
                                                    <option value="89">89 pages/approx 24475 words</option>
                                                    <option value="90">90 pages/approx 24750 words</option>
                                                    <option value="91">91 pages/approx 25025 words</option>
                                                    <option value="92">92 pages/approx 25300 words</option>
                                                    <option value="93">93 pages/approx 25575 words</option>
                                                    <option value="94">94 pages/approx 25850 words</option>
                                                    <option value="95">95 pages/approx 26125 words</option>
                                                    <option value="96">96 pages/approx 26400 words</option>
                                                    <option value="97">97 pages/approx 26675 words</option>
                                                    <option value="98">98 pages/approx 26950 words</option>
                                                    <option value="99">99 pages/approx 27225 words</option>
                                                    <option value="100">100 pages/approx 27500 words</option>
                                                    <option value="101">101 pages/approx 27775 words</option>
                                                    <option value="102">102 pages/approx 28050 words</option>
                                                    <option value="103">103 pages/approx 28325 words</option>
                                                    <option value="104">104 pages/approx 28600 words</option>
                                                    <option value="105">105 pages/approx 28875 words</option>
                                                    <option value="106">106 pages/approx 29150 words</option>
                                                    <option value="107">107 pages/approx 29425 words</option>
                                                    <option value="108">108 pages/approx 29700 words</option>
                                                    <option value="109">109 pages/approx 29975 words</option>
                                                    <option value="110">110 pages/approx 30250 words</option>
                                                    <option value="111">111 pages/approx 30525 words</option>
                                                    <option value="112">112 pages/approx 30800 words</option>
                                                    <option value="113">113 pages/approx 31075 words</option>
                                                    <option value="114">114 pages/approx 31350 words</option>
                                                    <option value="115">115 pages/approx 31625 words</option>
                                                    <option value="116">116 pages/approx 31900 words</option>
                                                    <option value="117">117 pages/approx 32175 words</option>
                                                    <option value="118">118 pages/approx 32450 words</option>
                                                    <option value="119">119 pages/approx 32725 words</option>
                                                    <option value="120">120 pages/approx 33000 words</option>
                                                    <option value="121">121 pages/approx 33275 words</option>
                                                    <option value="122">122 pages/approx 33550 words</option>
                                                    <option value="123">123 pages/approx 33825 words</option>
                                                    <option value="124">124 pages/approx 34100 words</option>
                                                    <option value="125">125 pages/approx 34375 words</option>
                                                    <option value="126">126 pages/approx 34650 words</option>
                                                    <option value="127">127 pages/approx 34925 words</option>
                                                    <option value="128">128 pages/approx 35200 words</option>
                                                    <option value="129">129 pages/approx 35475 words</option>
                                                    <option value="130">130 pages/approx 35750 words</option>
                                                    <option value="131">131 pages/approx 36025 words</option>
                                                    <option value="132">132 pages/approx 36300 words</option>
                                                    <option value="133">133 pages/approx 36575 words</option>
                                                    <option value="134">134 pages/approx 36850 words</option>
                                                    <option value="135">135 pages/approx 37125 words</option>
                                                    <option value="136">136 pages/approx 37400 words</option>
                                                    <option value="137">137 pages/approx 37675 words</option>
                                                    <option value="138">138 pages/approx 37950 words</option>
                                                    <option value="139">139 pages/approx 38225 words</option>
                                                    <option value="140">140 pages/approx 38500 words</option>
                                                    <option value="141">141 pages/approx 38775 words</option>
                                                    <option value="142">142 pages/approx 39050 words</option>
                                                    <option value="143">143 pages/approx 39325 words</option>
                                                    <option value="144">144 pages/approx 39600 words</option>
                                                    <option value="145">145 pages/approx 39875 words</option>
                                                    <option value="146">146 pages/approx 40150 words</option>
                                                    <option value="147">147 pages/approx 40425 words</option>
                                                    <option value="148">148 pages/approx 40700 words</option>
                                                    <option value="149">149 pages/approx 40975 words</option>
                                                    <option value="150">150 pages/approx 41250 words</option>
                                                    <option value="151">151 pages/approx 41525 words</option>
                                                    <option value="152">152 pages/approx 41800 words</option>
                                                    <option value="153">153 pages/approx 42075 words</option>
                                                    <option value="154">154 pages/approx 42350 words</option>
                                                    <option value="155">155 pages/approx 42625 words</option>
                                                    <option value="156">156 pages/approx 42900 words</option>
                                                    <option value="157">157 pages/approx 43175 words</option>
                                                    <option value="158">158 pages/approx 43450 words</option>
                                                    <option value="159">159 pages/approx 43725 words</option>
                                                    <option value="160">160 pages/approx 44000 words</option>
                                                    <option value="161">161 pages/approx 44275 words</option>
                                                    <option value="162">162 pages/approx 44550 words</option>
                                                    <option value="163">163 pages/approx 44825 words</option>
                                                    <option value="164">164 pages/approx 45100 words</option>
                                                    <option value="165">165 pages/approx 45375 words</option>
                                                    <option value="166">166 pages/approx 45650 words</option>
                                                    <option value="167">167 pages/approx 45925 words</option>
                                                    <option value="168">168 pages/approx 46200 words</option>
                                                    <option value="169">169 pages/approx 46475 words</option>
                                                    <option value="170">170 pages/approx 46750 words</option>
                                                    <option value="171">171 pages/approx 47025 words</option>
                                                    <option value="172">172 pages/approx 47300 words</option>
                                                    <option value="173">173 pages/approx 47575 words</option>
                                                    <option value="174">174 pages/approx 47850 words</option>
                                                    <option value="175">175 pages/approx 48125 words</option>
                                                    <option value="176">176 pages/approx 48400 words</option>
                                                    <option value="177">177 pages/approx 48675 words</option>
                                                    <option value="178">178 pages/approx 48950 words</option>
                                                    <option value="179">179 pages/approx 49225 words</option>
                                                    <option value="180">180 pages/approx 49500 words</option>
                                                    <option value="181">181 pages/approx 49775 words</option>
                                                    <option value="182">182 pages/approx 50050 words</option>
                                                    <option value="183">183 pages/approx 50325 words</option>
                                                    <option value="184">184 pages/approx 50600 words</option>
                                                    <option value="185">185 pages/approx 50875 words</option>
                                                    <option value="186">186 pages/approx 51150 words</option>
                                                    <option value="187">187 pages/approx 51425 words</option>
                                                    <option value="188">188 pages/approx 51700 words</option>
                                                    <option value="189">189 pages/approx 51975 words</option>
                                                    <option value="190">190 pages/approx 52250 words</option>
                                                    <option value="191">191 pages/approx 52525 words</option>
                                                    <option value="192">192 pages/approx 52800 words</option>
                                                    <option value="193">193 pages/approx 53075 words</option>
                                                    <option value="194">194 pages/approx 53350 words</option>
                                                    <option value="195">195 pages/approx 53625 words</option>
                                                    <option value="196">196 pages/approx 53900 words</option>
                                                    <option value="197">197 pages/approx 54175 words</option>
                                                    <option value="198">198 pages/approx 54450 words</option>
                                                    <option value="199">199 pages/approx 54725 words</option>
                                                    <option value="200">200 pages/approx 55000 words</option>

                                                </select>
                                        	</div>
                                    	</div>

                                    	<div class="form-group row">
                                             <label class="col-md-4">Academic Area </label>
                                             <div class="col-md-8"> 

                                            <select title="Subject area" class="form-control" name="order_subject" onchange="">
                                                    <option selected="selected" value="10">Art</option>
    
                                                        <option value="Architecture">&nbsp;&nbsp;Architecture</option>
                                                        <option value="Dance">&nbsp;&nbsp;Dance</option>
                                                        <option value="Design Analysis">&nbsp;&nbsp;Design Analysis</option>
                                                        <option value="Drama">&nbsp;&nbsp;Drama</option>
                                                        <option value="Movies">&nbsp;&nbsp;Movies</option>
                                                        <option value="Music">&nbsp;&nbsp;Music</option>
                                                        <option value="Paintings">&nbsp;&nbsp;Paintings</option>
                                                        <option value="Theatre">&nbsp;&nbsp;Theatre</option>
                                                        <option value="Biology">Biology</option>
                                                        <option value="Business">Business</option>
                                                        <option value="Chemistry">Chemistry</option>
                                                        <option value="Communications and Mass Media">Communications and Media</option>
                                                        <option value="Advertising">&nbsp;&nbsp;Advertising</option>
                                                        <option value="Communication Strategies">&nbsp;&nbsp;Communication Strategies</option>
                                                        <option value="Journalism">&nbsp;&nbsp;Journalism</option>
                                                        <option value="Public Relations">&nbsp;&nbsp;Public Relations</option>
                                                        <option value="Creative writing">Creative writing</option>
                                                        <option value="Economics">Economics</option>
                                                        <option value="Accounting">&nbsp;&nbsp;Accounting</option>
                                                        <option value="CAse Study">&nbsp;&nbsp;Case Study</option>
                                                        <option value="Company Analysis">&nbsp;&nbsp;Company Analysis</option>
                                                        <option value="E-Commerce">&nbsp;&nbsp;E-Commerce</option>
                                                        <option value="Finance">&nbsp;&nbsp;Finance</option>
                                                        <option value="Investment">&nbsp;&nbsp;Investment</option>
                                                        <option value="Logistics">&nbsp;&nbsp;Logistics</option>
                                                        <option value="Trade">&nbsp;&nbsp;Trade</option>
                                                        <option value="Education">Education</option>
                                                        <option value="Application Essay">&nbsp;&nbsp;Application Essay</option>
                                                        <option value="Education Theories">&nbsp;&nbsp;Education Theories</option>
                                                        <option value="Pedagogy">&nbsp;&nbsp;Pedagogy</option>
                                                        <option value="Teacher's Career">&nbsp;&nbsp;Teacher's Career</option>
                                                        <option value="Engineering">Engineering</option>
                                                        <option value="English">English</option>
                                                        <option value="Ethics">Ethics</option>
                                                        <option value="History">History</option>
                                                        <option value="38">&nbsp;&nbsp;African-American Studies</option>
                                                        <option value="37">&nbsp;&nbsp;American History</option>
                                                        <option value="42">&nbsp;&nbsp;Asian Studies</option>
                                                        <option value="41">&nbsp;&nbsp;Canadian Studies</option>
                                                        <option value="44">&nbsp;&nbsp;East European Studies</option>
                                                        <option value="45">&nbsp;&nbsp;Holocaust</option>
                                                        <option value="40">&nbsp;&nbsp;Latin-American Studies</option>
                                                        <option value="39">&nbsp;&nbsp;Native-American Studies</option>
                                                        <option value="43">&nbsp;&nbsp;West European Studies</option>
                                                        <option value="Law">Law</option>
                                                        <option value="Criminology">&nbsp;&nbsp;Criminology</option>
                                                        <option value="Legal Issues">&nbsp;&nbsp;Legal Issues</option>
                                                        <option value="Linguistics">Linguistics</option>
                                                        <option value="Literature">Literature</option>
                                                        <option value="American Literature">&nbsp;&nbsp;American Literature</option>
                                                        <option value="Antique Literature
                                                        ">&nbsp;&nbsp;Antique Literature</option>
                                                        <option value="Asian Literature">&nbsp;&nbsp;Asian Literature</option>
                                                        <option value="English Literature">&nbsp;&nbsp;English Literature</option>
                                                        <option value="Shakespeare Studies">&nbsp;&nbsp;Shakespeare Studies</option>
                                                        <option value="Management">Management</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Mathematics">Mathematics</option>
                                                        <option value="Medicine and Health">Medicine and Health</option>
                                                        <option value="Alternative Medicine">&nbsp;&nbsp;Alternative Medicine</option>
                                                        <option value="Healthcare">&nbsp;&nbsp;Healthcare</option>
                                                        <option value="Nursing">&nbsp;&nbsp;Nursing</option>
                                                        <option value="Nutrition">&nbsp;&nbsp;Nutrition</option>
                                                        <option value="Pharmacology">&nbsp;&nbsp;Pharmacology</option>
                                                        <option value="Sport">&nbsp;&nbsp;Sport</option>
                                                        <option value="78">Nature</option>
                                                        <option value="85">&nbsp;&nbsp;Agricultural Studies</option>
                                                        <option value="Anthropology">&nbsp;&nbsp;Anthropology</option>
                                                        <option value="Astronomy">&nbsp;&nbsp;Astronomy</option>
                                                        <option value="Environmental Issues">&nbsp;&nbsp;Environmental Issues</option>
                                                        <option value="Geography">&nbsp;&nbsp;Geography</option>
                                                        <option value="Geology">&nbsp;&nbsp;Geology</option>
                                                        <option value="Philosophy">Philosophy</option>
                                                        <option value="Physics">Physics</option>
                                                        <option value="Political Science">Political Science</option>
                                                        <option value="Psychology">Psychology</option>
                                                        <option value="Religion">Religion and Theology</option>
                                                        <option value="Sociology">Sociology</option>
                                                        <option value="Technology">Technology</option>
                                                        <option value="Aeronautics">&nbsp;&nbsp;Aeronautics</option>
                                                        <option value="Aviation">&nbsp;&nbsp;Aviation</option>
                                                        <option value="Computer Science">&nbsp;&nbsp;Computer Science</option>
                                                        <option value="Internet">&nbsp;&nbsp;Internet</option>
                                                        <option value="Management">&nbsp;&nbsp;IT Management</option>
                                                        <option value="Web Design">&nbsp;&nbsp;Web Design</option>
                                                        <option value="Tourism">Tourism</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                             <label class="col-md-4">Type of Document </label>
                                             <div class="col-md-8"> 

                                            <select title="paper_type" class="form-control" name="paper_type">
                                            <option selected="selected" value="Essay">Essay</option>
                                                <option value="Term Paper">Term Paper</option>
                                                <option value="Research Paper">Research Paper</option>
                                                <option value="Coursework">Coursework</option>
                                                <option value="Book Report">Book Report</option>
                                                <option value="Book Review">Book Review</option>
                                                <option value="Movie Review">Movie Review</option>
                                                <option value="Dissertation">Dissertation</option>
                                                <option value="Thesis">Thesis</option>
                                                <option value="Thesis Proposal">Thesis Proposal</option>
                                                <option value="Research Proposal">Research Proposal</option>
                                                <option value="Dissertation Chapter - Abstract">Dissertation Chapter - Abstract</option>
                                                <option value="Dissertation Chapter - Introduction Chapter">Dissertation Chapter - Introduction Chapter</option>
                                                <option value="Dissertation Chapter - Literature Review">Dissertation Chapter - Literature Review</option>
                                                <option value="Dissertation Chapter - Methodology">Dissertation Chapter - Methodology</option>
                                                <option value="Dissertation Chapter - Results">Dissertation Chapter - Results</option>
                                                <option value="Dissertation Chapter - Discussion">Dissertation Chapter - Discussion</option>
                                                <option value="Dissertation Services - Editing">Dissertation Services - Editing</option>
                                                <option value="Dissertation Services - Proofreading">Dissertation Services - Proofreading</option>
                                                <option value="Formatting">Formatting</option>
                                                <option value="Admission Services - Admission Essay">Admission Services - Admission Essay</option>
                                                <option value="Admission Services - Scholarship Essay">Admission Services - Scholarship Essay</option>
                                                <option value="Admission Services - Personal Statement">Admission Services - Personal Statement</option>
                                                <option value="Admission Services - Editing">Admission Services - Editing</option>
                                                <option value="Editing">Editing</option>
                                                <option value="Proofreading">Proofreading</option>
                                                <option value="Case Study">Case Study</option>
                                                <option value="Lab Report">Lab Report</option>
                                                <option value="Speech Presentation">Speech Presentation</option>
                                                <option value="Math Problem">Math Problem</option>
                                                <option value="Article">Article</option>
                                                <option value="Article Critique">Article Critique</option>
                                                <option value="Annotated Bibliography">Annotated Bibliography</option>
                                                <option value="Reaction Paper">Reaction Paper</option>
                                                <option value="PowerPoint Presentation">PowerPoint Presentation</option>
                                                <option value="Statistics Project">Statistics Project</option>
                                                <option value="Multiple Choice Questions (None-Time-Framed)">Multiple Choice Questions (None-Time-Framed)</option>
                                                <option value="Other (Not listed)">Other (Not listed)</option>

                                                </select>
                                        </div>
                                       
                                        </div>
                                         <hr>
                                        	<div class="alert alert-warning row" role="alert">
											
										        <label class="col-md-4">Document Spacing  </label>
                                                <div class="col-md-8">
                                                    <div class="radio">
                                                        <label>
                                                        <input type="radio" onchange="calculate_price()" value="1" name="spacing">  Single
                                                        </label> 
                                                        <label>
                                                            <input type="radio" onchange="calculate_price()" value="2" name="spacing">  Double
                                                        </label>                                                  
                                                                       
                                                </div>
                                            </div>
                                            
                                         </div>

                                         <hr>
                                           <div class="form-group row">
                                                <label class="col-md-4">Academic level  </label>
                                                <div class="col-md-8">
		                                            <select id="academic_level" onchange="calculate_price()" name="academic_level" class="form-control" size="1">
		                                                <option selected="selected" value="phd">PHD</option>
		                                                <option value="masters">Masters (Year > 2)</option>
		                                                <option value="senior">Senior College (Year > 2)</option>
		                                                <option value="junior">Junior College (Yr 1-2)</option>
		                                                <option value="highschool">High School</option>
		                                                <option value="other">Other</option>
		                                                    
		                                            </select>                                   
                                                                                                      
                                                </div>
                                            
                                            </div>

                                           <!--- Not woring -->
                                            <div class="form-group row">
                                               @include('part.auto-com')
                                            </div>
                                            <!--- End Not working -->

                                            <div class="form-group row">
                                                <label class="col-md-4">Preferred Language  </label>
                                                <div class="col-md-8">

	                                                <select class="form-control" name="lang_style" id="langstyle">
	                                                    <option selected="selected" value="U.S">English (U.S.)</option>
	                                                    <option value="U.K">English (U.K.)</option>
	                                                </select>
                                                </div>
                                            
                                            </div>
                                             <hr>
                                            <div class="card" style="margin-top: 20px; margin-bottom:20px; text-align: center; margin-left: 0px;">
						                        <div class="card-body">
						                            <h2><strong>What is your Deadline?</strong></h2>
						                            <p>Click on the box below to select deadline</p>
						                            <div class="row">
						                                <div class='col-md-12'>

						                                    @include('part.datetimepicker')

						                                </div>
						                            </div>

						                        </div>
						                    </div>
                          
                                            <div class="card" style="margin-top: 20px; margin-bottom: 20px; margin-left: 0px;">
					                            <div class="card-body">
					                              	<span class="btn btn-primary btn-block" onclick="calculate_price()"><h4>Preview Price </h4> 
					                              	</span>                           
							                    </div>
							                </div>

                     						<input type="hidden" name="tutor_price" 
                            					 value="tutor_price_calc()" />

						                    <div class="card" style="margin-top: 20px; margin-bottom: 20px; margin-left: 0px; text-align: center;">
						                        <div class="card-body">
						                              <h3 class="card-title">What is your Price</h3>
						                              <p>Use the + and - sign to increase to the agreed price, good prices attract good tutors</p>


						                        	<div> 
						                        		
						                        		<input type="text" style="text-align:center" id="price" name="question_price" class="form-control"  readonly>
						                            	
						                        	</div>
						                     
						                    </div>
						                    <div class="card" style="margin-top: 20px; margin-bottom:20px; margin-left: 0px;">
						                             <div class="card-body">
						                                 <p><strong>The average question is picked up within 15 minutes
						                                Satisfaction is guaranteed. </strong></p>

						                        </div>
						                    </div>

						                    <button type='submit'             
                        						class="btn btn-primary btn-md btn-block">
					                        <h3>
					                            <strong>  Finish
					                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
					                            </strong>
					                        </h3></button>
                    						</div>                  					                                        
                                        
		                            
				        </article>                          
				                            
				           
				        </section>
				                            
                      


@endsection
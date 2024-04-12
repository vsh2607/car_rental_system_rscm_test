<h1>Installation Guide</h1>
<p>1. Clone Repository</p>
<p>git clone https://github.com/vsh2607/car_rental_system_rscm_test.git</p>
<p>2. After cloning, run this command on terminal</p>
<pre>composer install</pre>
<p>3. Make a copy of env.example and rename to .env </p>
<p>4. Generate  APP_KEY by this command </p>
<pre>php artisan key:generate</pre>
<p>5. Run Migration </p>
<pre>php artisan migrate --seed</pre>


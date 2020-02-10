# FrameworkValou
- Framework Mouli
- Simple PHP MVC Framework, using MySql/Doctrine/Namespace/Templates
- Set up a simple PHP project in less than 2 min
- Check documentation bellow

# Installation

Once the project downloaded :
- install dependency with a composer install
- configure and rename the **env.php.dist** file

```php
define('PROJECT_NAME', 'FrameworkValou');
define('ENV', 'dev');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'test');
define('ROOT', dirname(str_replace('\\', '/', __DIR__)));
define('PATH', 'http://localhost/FrameworkValou');
define('MJ_APIKEY_PUBLIC', 'IF YOU USE MAILJET');
define('MJ_APIKEY_PRIVATE', 'IF YOU USE MAILJET');
define('MJ_FROM_EMAIL', 'IF YOU USE MAILJET');
define('MJ_FROM_NAME', 'IF YOU USE MAILJET');
define('FACEBOOK_APIKEY', 'FACEBOOK API KEY');
define('FACEBOOK_API_SECRET', 'FACEBOOK API SECRET');
define('UPLOAD_PATH', 'Public/images/upload');
define('DEFAULT_LANGAGE', 'en');
```
- run **vendor\bin\doctrine orm:schema-tool:update --force --dump-sql** for the database schema
- run **vendor\bin\doctrine dbal:import data.sql** to import existing translations 

# How it work
## Controllers
### Use your controller

**App/controller/homecontroller.php**

```php
<?php

namespace App\Controller;

use Core\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
	$str = 'Hello World';
		
	//choose your template. Default template installed in App/views/templates
        $this->template = 'default'; 
		
	//choose your rendering view in this case, on App/views/home/index.php
	//inject variables to your view
        $this->render('home/index', compact('str'));
    }
}
```
### Call your controller

![](https://nsa40.casimages.com/img/2020/02/01/200201040150387769.png)


## Views
### Use your view
**App/views/home/index.php**

```php
<h1 class="center"><?= $str ?></h1>
```
Will display

![](https://nsa40.casimages.com/img/2020/02/01/200201035704116934.png)

### Use and create your front functions

Front functions are located in **Core/Services/Twig.php**
Use your funtions in your view like this

**App/views/home/index.php**
```php
<h1 class="center"><?= $str ?></h1>

<?php if($this->twig->logged()): ?>
    <p>Logged !</p>
<?php endif; ?>
```

### Translations

You can use the translation system integrated, available on http://localhost/youproject/admin/translations

#### Add a translation

![](https://nsa40.casimages.com/img/2020/02/01/200201041615826792.png)

#### Search and edit a translation

![](https://nsa40.casimages.com/img/2020/02/01/200201041733370902.png)

#### Use your translation

Use the translation() function in your view.

```php
<h2 class="center"><?= $this->twig->translation('home.index.title') ?></h2>
```

You can also use parameters on the translations function. Just add an array with the name of yours parameters.

```php
<h2 class="center"><?= $this->twig->translation('home.index.title', ['param1' => $str]) ?></h2>
```

Your trad chain « home.index.title » must contain the value « %param1% » 

#### Configure the langage

Set up the langage english or french in you **env.php**
You can add your propers langages later.

```php
define('DEFAULT_LANGAGE', 'en');
```

## Model

The project is setup to use MySQL and Doctrine

#### Use Doctrine

Doctrine can be called from the class Services in **Core/Services/Services.php**

In a **controller** you just have to

```php
$this->services->getDoctrine();
```

In your repository, just set up the Service in the constructor like this :

```php
class TranslationsRepository
{

    protected $entityManager;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->entityManager = new Services();
    }
	
```

Then just get doctrine like so

```php
    public function test()
    {
        $translation = new Translations();
        $translation->setNom('name');
        $translation->setFr('fr');
        $translation->setEn('en');
        $this->entityManager->getDoctrine()->persist($translation);
        $this->entityManager->getDoctrine()->flush();
    }
	
```

Use doctrine commands

```php
vendor\bin\doctrine orm:schema-tool:update --force --dump-sql
```

#### Use mysql

You can also use mysql for specific queries
Just call staticly the function getInstance() from the class SPDO in **App/Model/SPDO.php**

```php
    public function findTranslation($name)
    {
        $query = 'SELECT * FROM translations WHERE nom LIKE :name OR fr LIKE :name OR en LIKE :name LIMIT 5';
        $req = SPDO::getInstance()->prepare($query);
        $req->execute([':name' => '%'.$name.'%']);
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }
	
```

#### Services

The class Services is in **Core/Services/Services.php**
You can setup your services, and config them in the Config class  **Core/Config.php**

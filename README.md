# FrameworkValou
Framework Mouli
Simple PHP MVC Framework, using MySql/Doctrine/Namespace/Templates
Check documentation bellow

# How to use <h1>

## Set up your project <h2> 
```
index.php
//define your path project
define('PATH', 'http://localhost/test');
```

## Use controller <h2> 
App/Controller/HomeController.php

![img](https://puu.sh/zQxQw/f346eaacfe.png)

## Use your view <h2> 
App/Views/Home/index.php

![img](https://puu.sh/zQxVk/894ed7fd97.png)

## Call your Controller <h2> 
![img](https://puu.sh/zQy9w/e8c273d1f4.png)

## Use MySql <h2> 
Set up your configuration in App/Model/SPDO.php

![img](https://puu.sh/zQAeQ/a8fd7848e9.png)

Call staticly your SPDO object on your repository/controller

![img](https://puu.sh/zQAjc/2aeea4e66b.png)

## Use Doctrine <h2> 
Set up your configuration in Core/Controller/DoctrineORM.php

![img](https://puu.sh/zQAAx/de5921d231.png)

Create your object Doctrine 

![img](https://puu.sh/zQACS/87829681f7.png)

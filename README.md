# LET'S CONNECT

Let's connect is a web appliaction that will serce as a space for like-minded individuals in the IT sector to connect and collaborate easily.


The web application will facilitate connections among individuals passionate about solving problems in specific sectors or communities. Users can create groups based on their missions or the issues they aim to solve. Additionally, the platform will enable users to form groups centered around the courses they are taking, fostering a supportive environment for teaching and learning from one another.


By leveraging this web application, aspiring IT professionals will have the opportunity to work on real-life projects, gaining practical experience and showcasing their capabilities to potential recruiters. This approach will help mitigate the requirement for 2 to 5 years of prior experience, as employers can assess candidates based on their demonstrated skills and contributions within the platform.


The ultimate goal of "Let's Connect" is to attract and empower more young individuals to pursue careers in the IT field by providing them with a collaborative platform that enhances their learning, networking, and employment opportunities.

## Installation and Usage

If you want to run Let's connect on your local environment, you need to have the latest version of php installed on your system (php v8.1 or 8.2), xampp server, and composer installed on your system

Here's a concise set of steps you can follow when cloning this project:

* Clone the Project:
```
    git clone https://github.com/Nkurunzizagashati/LETS-CONNECT.git
```
* Navigate to the Project Directory:
```
    cd repository
```
* Install PHP Dependencies:
```
    composer install
```
* Install JavaScript Dependencies:
  if you are using window
```
    npm install
``` 
or if you are using mac
```
    yarn install
``` 
* Copy the Environment Configuration:
```
    cp .env.example .env
```
    and then configure your .env accordingly
* Generate an Application Key:
```
    php artisan key:generate
```

* Run Migrations:
```
    php artisan migrate
```

* Start the Development Server:
```
    php artisan serve
```

* Open an other terminal to compile js codes and run 
```
    npm run dev
``` 

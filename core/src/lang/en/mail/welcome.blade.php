Hello {{ $user->username }},

You have signed up for the darkstar Game. In order to activate your account please click the following link:


-----------------------------------------------------------------------------------------------------------------------------------

Your access data:

Username: {{ $user->username }}

Email Address: {{ $user->email }}

Server: <server name>

Activation Code: {{ $user->activation_code }}


-----------------------------------------------------------------------------------------------------------------------------------

Game Information:
This game is still in heavy development and bugs will occur, if you find any bugs please report them at <bugreport site>.
If you need any help or basic tips you can find our guides at <guide url>

We hope you enjoy the game and best of luck!


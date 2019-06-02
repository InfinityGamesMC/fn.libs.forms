# fn.libs.forms
A form library for PocketMine-MP, inspired by EasyForms, FormAPI and BlockSniper.
**Better name suggestions are welcome**
  
### TODO
* Add the remaining elements
* Allow setting a global callback for dropdowns instead of only individual options?

------
  
### Usage
You can use this library as a virion or a plugin.

#### Button List Example
```php
$form = new SimpleForm("Servers");

$form->addButton("Hunger Games", function() {
    $player->transfer("hg.example.com");
});

$form->onClose(function() {
    $player->sendMessage("Closed form");
});

$player->sendForm($form);
```

------

### Modal Form Example
```php
$form = new ModalForm("Reset Account", "Do you wish to delete your account? You will lose all your progress.");
$form->setYesButtonText("Yes");
$form->setNoButtonText("Cancel");
$form->onResponse(function($data) {
    // I cant remember what the data is but yeah
});
```

------

#### Custom Form Example
```php
$form = new CustomForm("Chat Effects");
$form->addLabel("Customize your chat!\n\n");

$dropdown = $form->addDropdown("Chat Colour");
foreach(["Default", "Aqua", "Gold"] as $colour) {
    $dropdown->addOption($colour, (bool) ($session->getPreference("chatColour") == $colour), function() use ($session, $colour) {
        $session->setPreference("chatColour", $colour, false);
    }
}

$form->addToggle("Display rank", (bool) $session->getPreference("displayRank"), function(bool $value) use ($session) {
    $session->setPreference("displayRank", $value, false);
});

$player->sendForm($form);
```
It is possible to omit the callbacks for toggles so that clicking wont do anything.  

#### Note
Basic support for server settings forms is included. You will have to handle the packets yourself, however.
  
## License
Licensed under the MIT License. See the file named `LICENSE` for more information.

Copyright (c) 2019 Funo Network.
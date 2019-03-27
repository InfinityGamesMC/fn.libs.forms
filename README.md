# fn.libs.forms
A form library for PocketMine-MP, inspired by EasyForms, FormAPI and BlockSniper.
  
### TODO
* Add the remaining elements
* Add server settings form
* Allow setting a global callback for dropdowns instead of only individual options

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

### Custom Form Example
```php
$form = new CustomForm("Chat Effects");

$colour = $form->addDropdown("Chat Colour");
$colour->addOption("Aqua", function() {
    $this->setNameColour($player, TextFormat::AQUA);
});

$form->addToggle("Display VIP Rank", $this->shouldShowRank, function(bool $value) {
    $this->toggleRank($player, $value);
});

$form->onClose(function() {
    $player->sendMessage("Closed form");
});

$player->sendForm($form);
```
It is possible to omit the callbacks so that clicking an element wont do anything.  
  
## License
Licensed under the MIT License. See the file named `LICENSE` for more information.

Copyright (c) 2019 Funo Network / BradW Ltd.
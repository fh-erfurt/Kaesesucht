<div class="product_title">
    <h1>Benutzerdaten</h1>
</div>

<div>
    <p>
        Hallo <?echo($this->currentUser['firstName'].' '.$this->currentUser['lastName']);?>,
        ich weiß wo du wohnst.
        Nämlich in <?echo($this->currentUser['city'].' '.$this->currentUser['zipCode']);?>.
        Dorthin werde ich liefern in die <?echo($this->currentUser['street'].' '.$this->currentUser['strNo']);?>.
        Nehm dich in acht denn unser Käse wird deine Geschmacksnerven sprengen und dich für immer von ihm abhängig machen.
    </p>
</div>
<div class="panel" >
    


<div id="id">
    <div class ="button marg-20 content-align-mid">
    <a href="javascript:toggle('dataid')">Nutzerdaten ändern</a>
    </div>
    <div id="dataid" class="panel popout content-align-mid" style="">
        <form method="POST" class="" id="editUser" action="">
            
            <input type="text" value="<?echo($this->currentUser['email']);?>" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['city']);?>" id="city" name="city" placeholder="Ort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ort'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['street']);?>" id="street" name="street" placeholder="Straße" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straße'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['strNo']);?>" id="strNo" name="strNo" placeholder="Straßennummer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straßennummer'" class="inputtext">
            <input type="text" value="<?echo($this->currentUser['zipCode']);?>" id="zipCode" name="zipCode" placeholder="PLZ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PLZ'" class="inputtext">
            <input type="submit" name="submit" id="editUser" value="editUser" class="button">
        </form>
    </div>
</div>
<noscript>
    <div id="id" class="panel popout content-align-mid" >
    <form method="POST" id="editUser" action="">
        
        <input type="text" value="<?echo($this->currentUser['email']);?>" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="inputtext">
        <input type="text" value="<?echo($this->currentUser['city']);?>" id="city" name="city" placeholder="Ort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ort'" class="inputtext">
        <input type="text" value="<?echo($this->currentUser['street']);?>" id="street" name="street" placeholder="Straße" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straße'" class="inputtext">
        <input type="text" value="<?echo($this->currentUser['strNo']);?>" id="strNo" name="strNo" placeholder="Straßennummer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Straßennummer'" class="inputtext">
        <input type="text" value="<?echo($this->currentUser['zipCode']);?>" id="zipCode" name="zipCode" placeholder="PLZ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PLZ'" class="inputtext">
        <input type="submit" name="submit" value="editUser" class="button">
    </form>
    </div>
    </noscript>

<div id="id">
    <div class ="button marg-20 content-align-mid">
    <a href="javascript:toggle('orderid')">Meine Bestellungen</a>
    </div>
    <div id="orderid" class="panel" style="display:none">
        <?foreach($this->params['orders'] as $key => $value):?>
        
            <div class="panel has--border">
                <?echo('Bestellung vom '.date('d.m.o H:i:s', strtotime($value[0]['orderDate'])).'<br> Zahlungsmethode '.$value[0]['payMethod']);?>
                <br>Produkte
                <?$sum =0;?>
                <?foreach($value as $item):?>
                        <div class="table--object column--full">
                            <img src="<?echo(ASSETPATH.'images'.DIRECTORY_SEPARATOR.$item['pictureName']);?>" class="column--image">
                            
                            <?echo($item['cheeseName']);?><br>
                            Stückzahl: <?echo($item['quantity']);?><br>
                            Preis: <?echo($item['price']);?> €
                        </div>
                        <?$sum += $item['price'];?>
                <?endforeach;?>
                <?echo('Summe '.$sum.' €');?>
            </div>
        <?endforeach;?>
    </div>
</div>

</div>
    <noscript>
    <div id="orderid" class="panel " style="">
            <?foreach($this->params['orders'] as $key => $value):?>
            
                <div class="panel has--border">
                    <?echo('Bestellung vom '.date('d.m.o H:i:s', strtotime($value[0]['orderDate'])).'<br> Zahlungsmethode '.$value[0]['payMethod']);?>
                    <br>Produkte
                    <?$sum =0;?>
                    <?foreach($value as $item):?>
                            <div class="table--object column--full">
                                <img src="<?echo(ASSETPATH.'images'.DIRECTORY_SEPARATOR.$item['pictureName']);?>" class="column--image">
                                
                                <?echo($item['cheeseName']);?><br>
                                Stückzahl: <?echo($item['quantity']);?><br>
                                Preis: <?echo($item['price']);?> €
                            </div>
                            <?$sum += $item['price'];?>
                    <?endforeach;?>
                    <?echo('Summe '.$sum.' €');?>
                </div>
            <?endforeach;?>
    </div>

</noscript>







<script type="text/javascript">
  function toggle(id){
    var e = document.getElementById(id);

    
    if (e.style.display == "none"){
       e.style.display = "";
    } else {
       e.style.display = "none";
    }
  }
</script>
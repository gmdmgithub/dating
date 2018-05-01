<fieldset>
	<legend>Proszę wypełnić nowe ogłoszenie</legend>
	<div class="register_row">
		<label for="imie">Nick jakim będzie wyświetlany w ogłoszeniu
			<span class="asterisk">*</span>
		</label>
		<input type="text" id="nick" name="nick" placeholder="Wpisz nick.." value="<?php echo $formData['nick'];?>">
	</div>
	<div class="register_row">
		<p class="ask_label">Kogo poszukujesz?
			<span class="asterisk">*</span>
		</p>
		<label class="seek">
			<input type="checkbox" name="szukam[]" value="przyjaciela" class="checkbox" <?php echo $formData['przyjaciel'];?>/> Przyjaciela</label>
		<label class="seek">
			<input type="checkbox" name="szukam[]" value="kolega" class="checkbox" <?php echo $formData['kolega'];?>/> Kolegę</label>
		<label class="seek">
			<input type="checkbox" name="szukam[]" value="maz_zona" class="checkbox" <?php echo $formData['maz_zona'];?>/> Męża/Żony</label>
		<label class="seek">
			<input type="checkbox" name="szukam[]" value="towazysza" class="checkbox" <?php echo $formData['towarzysz'];?>/> Towarzysza</label>
	</div>


	<div class="register_row">
		<label for="opis">Dodaj opis swojego ogłoszenia
			<span class="asterisk">*</span>
		</label>
		<textarea id="content" name="opis" placeholder="Wpisz treść.." style="height:100px" value="<?php echo $formData['opis'];?>"><?php echo $formData['opis'];?></textarea>
	</div>

	<div class="image_uploads">
		<label for="image_upload">Wybierz zdjęcie (PNG, JPG)</label>
		<br>
		<input type="file" id="image_upload" name="image_upload" accept=".jpg, .jpeg, .png">
	</div>

	<div class="register_row">
		<input type="hidden" name="<?php echo $page;?>_form" value="true">
		<input type="submit" value="Zapisz">
	</div>
</fieldset>
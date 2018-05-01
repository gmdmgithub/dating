<fieldset>
	<legend>Proszę wypełnić nowe ogłoszenie</legend>
	<div class="register_row">
		<label for="imie">Nick jakim będzie wyświetlany w ogłoszeniu
			<span class="asterisk">*</span>
		</label>
		<input type="text" id="nick" name="nick" placeholder="Wpisz nick..">
	</div>
	<div class="register_row">
		<p class="ask_label">Kogo poszukujesz?
			<span class="asterisk">*</span>
		</p>
		<label class="seek">
			<input type="checkbox" name="szukam[]" value="przyjaciela" class="checkbox" /> Przyjaciela</label>
		<label class="seek">
			<input type="checkbox" name="szukam[]" value="kolega" class="checkbox" /> Kolegę</label>
		<label class="seek">
			<input type="checkbox" name="szukam[]" value="maz_zona" class="checkbox" /> Męża/Żony</label>
		<label class="seek">
			<input type="checkbox" name="szukam[]" value="towazysza" class="checkbox" /> Towarzysza</label>
	</div>


	<div class="register_row">
		<label for="opis">Dodaj opis swojego ogłoszenia
			<span class="asterisk">*</span>
		</label>
		<textarea id="content" name="opis" placeholder="Wpisz treść.." style="height:100px"></textarea>
	</div>

	<div class="image_uploads">
		<label for="image_upload">Wybierz zdjęcie (PNG, JPG)</label>
		<br>
		<input type="file" id="image_upload" name="image_upload" accept=".jpg, .jpeg, .png">
	</div>

	<div class="register_row">
		<input type="hidden" name="new_proposal_form" value="true">
		<input type="submit" value="Zapisz">
	</div>
</fieldset>
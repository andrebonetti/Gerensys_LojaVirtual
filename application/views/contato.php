<section class="contato my-content">
    <div class="myContainer">
        
        <h1>Contato</h1>
        
        <div class="texto">
            
            <p>Entre em contato com a "Loja Virtual", esclareça suas dúvidas, mande sugestões.</p>

            <p class="telefone">
                <img src="<?=base_url("img/tel_icon_blue.png")?>">
                Tel.: 11 2622-2323
            </p>
            <p class="e-mail">
                <img src="<?=base_url("img/email_blue.png")?>">
                comercial@gerensys.com
            </p>
            
        </div>
        
        <div class="mapa">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.595911771931!2d-46.507491485745724!3d-23.51106006562009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce608fb039c585%3A0x4850b1c235e036dc!2sR.+Andr%C3%A9+Ansaldo%2C+2+-+Vila+Buenos+Aires%2C+S%C3%A3o+Paulo+-+SP%2C+03627-100!5e0!3m2!1spt-BR!2sbr!4v1498242654128" 
            width="100%" height="370" frameborder="0" style="border:0" allowfullscreen>
            </iframe>
        
        </div>  
               
        <div class="formulario">
        
            <?= form_open('contato/email_send')?>
                  
                <select class="form-control" name="assunto" autofocus>
                    <option>Selecione o Assunto</option>
                    <option value="Orçamento">Orçamento</option>
                    <option value="Currículo">Curriculo</option>
                    <option value="Dúvidas">Duvidas</option>
                    <option value="Reclamações">Reclamações</option>
                    <option value="Outros">Outros</option>
                </select>

                <input type="text" name="nome" class="form-control nome" placeholder="Nome Completo" required>

                <input type="text" name="email" class="form-control email" placeholder="E-mail" required>
      
                <input type="text" name="empresa" class="form-control empresa" placeholder="Empresa" required>

                <input type="text" name="telefone" class="form-control telefone" placeholder="Telefone com DDD" required maxlength="11">

                <textarea  name="mensagem" class="form-control" placeholder="Mensagem" required rows="4"></textarea><br>
                
                <div class="opcoes">
                    <button class="btn enviar" type="submit">Enviar</button>
                    <button class="btn limpar" type="reset">Limpar</button>
                </div>
            
          <?= form_close()?> 
        
        </div>
        
    </div>
</section>
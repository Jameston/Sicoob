<!DOCTYPE html>
<html>
   <body style="background-color: #F4F4F4!important; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
   <div style="max-width:600px; margin:0px auto; background-color:#fff">
    <div style="padding:60px 70px; border-top:1px solid rgba(0, 0, 0, 0.05)">
         <h1 style="margin-top:0px; text-align: center;"><img src="https://api.cotarme.com.br/assets/logo.png" style="max-height: 120px"></h1>

            <div style="background-color:#F4F4F4; margin:20px 0px 40px">
               <div style="padding:20px; text-transform:uppercase; color:#8D929D; font-size:11px; font-weight:bold; letter-spacing:1px; text-align:center">
                Dados da sua cotação:</div>
               <table style="border-collapse:collapse; width:100%">
                  <tbody>
                    <div style="color:#1976d2; font-size:16px; margin-bottom:30px; margin-left: 10px">
                        Olá, a empresa {{$cliente}} enviou uma solicitação de cotação de alguns items, acesse
                         o link da cotação. <strong>Cotação expira em: {{ $validade }}</strong>
                    </div>
                    <div style="color:#1976d2; font-size:14px; margin-bottom:30px; text-align: center;
                    cursor: default; text-decoration: none;">
                        <a href={{$link}} style="text-decoration: none;" target="_blank">
                            Acessar
                        </a>
                    </div>
                  </tbody>
               </table>
               <div style="color:#B8B8B8; font-size:12px; padding:30px; border-top:1px solid #e7e7e7">
                Após preencher a cotação, seu cliente irá receber os valores
                automaticamente facilitando sempre a troca de informações.</div>
            </div>
         </div>
      </div>
   </body>
</html>
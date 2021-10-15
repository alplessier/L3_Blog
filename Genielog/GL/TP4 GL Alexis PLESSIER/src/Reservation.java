package reservation;

import java.text.SimpleDateFormat;
import java.util.Date;
import gestionvol.Vol;

/*******************/
/* Alexis PLESSIER */
/*******************/

public class Reservation{

   private String numResa;
   private Date dateResa;
   private Clients client;
   private Passager passager;
   private Vol vol;
    

   //BUILDER
   public Reservation(){

   }

   //GETTERS SETTERS
   public String getNumResa(){
      return numResa;
   }

   public void setNumResa(String numResa){
      this.numResa = numResa;
   }

   public Date getDateResa(){
      return dateResa;
   }

   public void setDateResa(Date dateResa){
      this.dateResa = dateResa;
   }
  
   public Clients getClient(){
      return client;
   }

   public void setClient(Clients client){
      if(client != null){
         client.addClientWithoutBi(this);
      }
      if(this.client != null){
         this.client.removeClientWithoutBi(this);
      }
      this.client = client;
   }

   public Passager getPassager(){
      return passager;
   }

   public void setPassager(Passager passager){
      if(passager != null){
         passager.addPassagerWithoutBi(this);
      }
      if(this.passager != null){
         this.passager.removePassagerWithoutBi(this);
      }
      this.passager = passager;
   }

   public Vol getVol(){
      return vol;
   }

   public void setVol(Vol v){
      this.vol = v;
   }

   //BIDIRECTION

   protected void setClientWithoutBi(Clients client){
      this.client = client;
   }

   protected void setPassagerWithoutBi(Passager passager){
      this.passager = passager;
   }

  
   //METHODES

   public void annuler(){
      this.passager.removePassagerWithoutBi(this);
   }

}
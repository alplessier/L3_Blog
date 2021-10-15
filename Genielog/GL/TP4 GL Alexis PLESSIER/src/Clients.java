package reservation;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.ArrayList;
import java.util.Collection;

/*******************/
/* Alexis PLESSIER */
/*******************/



public class Clients{

   private String nom;
   private String ref;
   private String paiement;
   private String numTel;
   private Collection<Reservation> resa = new ArrayList<>(); 
   
   

   //BUILDER
   public Clients(){
      
   }

   //GETTERS SETTERS
   public String getNom(){
      return nom;
   }

   public void setNom(String nom){
      this.nom = nom;
   }

   public String getRef(){
      return ref;
   }

   public void setRef(String ref){
      this.ref = ref;
   }

   public String getPaiement(){
      return paiement;
   }

   public void setPaiement(String paiement){
      this.paiement = paiement;
   }

   public String getNumTel(){
      return numTel;
   }

   public void setNumTel(String numTel){
      this.numTel = numTel;
   }

   public Collection<Reservation> getResa(){
      return resa;
   }

   public void setResa(Collection<Reservation> resa){
      for(Reservation r : this.resa){
         r.setClientWithoutBi(null);
      }

      this.resa = resa;

      if(this.resa != null){
         for(Reservation r : this.resa){
            r.setClientWithoutBi(this);
         }
      }
   }

   public void addResa(Reservation res){
      res.setClientWithoutBi(this);
      this.resa.add(res);
   }

   public void removeResa(Reservation res){
      res.setClientWithoutBi(null);
      this.resa.remove(res);
   }

   //BIDIRECTION

   protected void setClientsWithoutBi(Collection<Reservation> resa){
      this.resa=resa;
   }

   protected void addClientWithoutBi(Reservation res){
      this.resa.add(res);
   }

   protected void removeClientWithoutBi(Reservation res){
      this.resa.remove(res);
   }
}
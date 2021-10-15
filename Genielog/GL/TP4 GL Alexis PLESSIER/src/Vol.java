package gestionvol;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.time.Duration;
import java.util.ArrayList;
import java.util.Collection;
import reservation.Reservation;

/*******************/
/* Alexis PLESSIER */
/*******************/

public class Vol{

   
   private String numeroVol;
   private Aeroport aeroDepart;
   private Aeroport aeroArrivee;
   private Compagnie compagnie;
   private Date dateDepart;
   private Date dateArrivee;
   private Duration duree;
   private Collection<Reservation> resa = new ArrayList<>();
   private int places;

   
   

   //BUILDER
   public Vol(){

   }


   //GETTERS SETTERS
   public String getNumeroVol(){
      return numeroVol;
   }

   public void setNumeroVol(String numeroVol){
      this.numeroVol=numeroVol;
   }

   public Aeroport getAeroDepart(){
      return aeroDepart;
   }

   public void setAeroDepart(Aeroport aeroDepart){
      this.aeroDepart = aeroDepart;
   }

   public Aeroport getAeroArrivee(){
      return aeroArrivee;
   }

   public void setAeroArrivee(Aeroport aeroArrivee){
      this.aeroArrivee = aeroArrivee;
   }

   public Compagnie getCompagnie(){
      return compagnie;
   }

   public void setCompagnie(Compagnie compagnie){
      if(compagnie != null){
         compagnie.addVolWithoutBi(this);
      }
      if(this.compagnie != null){
         this.compagnie.removeVolWithoutBi(this);
      }
      this.compagnie = compagnie;
   }

   public Collection<Reservation> getResa(){
      return resa;
   }

   public void setResa(Collection<Reservation> resa){
      
      this.resa = resa;
   }

   public void addResa(Reservation res){

      try {
         if(this.ouvrir() == true){
            this.resa.add(res);
            places = places-1;
         }
      } 
      catch (Exception e) {
      System.out.println("Erreur : Plus de place sur le vol !");
      }
   }

   public void removeResa(Reservation res){
      this.resa.remove(res);
      places = places+1;
   }

   //BIDIRECTION
   protected void setCompagnieWithoutBi(Compagnie compagnie){
      this.compagnie = compagnie;
   }
   /////////////

   SimpleDateFormat format = new SimpleDateFormat("dd/MM/yyyy hh:mm");

   public Date getDateDepart(){
      return dateDepart;
   }

   public void setDateDepart(String dd){
      try {
         this.dateDepart=format.parse(dd);
      } catch (Exception e) {
         System.out.println("Erreur parser format");
      }

      
   }

   public Date getDateArrivee(){
      return dateArrivee;
   }

   

   public void setDateArrivee(String da){
      try {
         this.dateArrivee=format.parse(da);
      } catch (Exception e) {
         System.out.println("Erreur parser format");
      }
   }

   //METHODE
   public Duration getDuree(){
      if(this.dateDepart != null && this.dateArrivee != null){
         return Duration.ofMillis((dateArrivee.getTime() - dateDepart.getTime()));
      } return null;
   }

   public boolean ouvrir(){
      if(places > 0)
         return true;
      else return false;
   } 

   public boolean fermer(){
      if(places > 0){
         return false;
      }
      else return true;
      
   }



   @Override
   public boolean equals(Object obj){
      try {
         return ((Vol) obj).getNumeroVol().equals(this.numeroVol);
      } catch (Exception e) {
         return false;
      }
   }

}
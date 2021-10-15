package reservation;

import java.util.ArrayList;
import java.util.Collection;

/*******************/
/* Alexis PLESSIER */
/*******************/

public class Passager{

   private String nom;
   private Collection<Reservation> resa = new ArrayList<>(); 

   //BUILDER
   public Passager(){

   }


   //GETTERS SETTERS
   public String getNom(){
      return nom;
   }

   public void setNom(String nom){
      this.nom=nom;
   }

   public Collection<Reservation> getResa(){
      return resa;
   }

   public void setResa(Collection<Reservation> resa){
      for(Reservation r : this.resa){
         r.setPassagerWithoutBi(null);
      }

      this.resa = resa;

      if(this.resa != null){
         for(Reservation r : this.resa){
            r.setPassagerWithoutBi(this);
         }
      }
   }

   public void addResa(Reservation res){
      res.setPassagerWithoutBi(this);
      this.resa.add(res);
   }

   public void removeResa(Reservation res){
      res.setPassagerWithoutBi(null);
      this.resa.remove(res);
   }

   //BIDIRECTION
   protected void setPassagerWithoutBi(Collection<Reservation> resa){
      this.resa=resa;
   }

   protected void addPassagerWithoutBi(Reservation res){
      this.resa.add(res);
   }

   protected void removePassagerWithoutBi(Reservation res){
      this.resa.remove(res);
   }
}
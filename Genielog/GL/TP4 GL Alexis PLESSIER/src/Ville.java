package gestionvol;

import java.util.ArrayList;
import java.util.Collection;

/*******************/
/* Alexis PLESSIER */
/*******************/

public class Ville{

   private String nomVille;
   private Collection<Aeroport>aeros = new ArrayList<>();


   //BUILDER
   public Ville(){

   }


   //GETTERS SETTERS
   public String getNomVille(){
      return nomVille;
   }

   public void setNomVille(String nomVille){
      this.nomVille=nomVille;
   }

   public Collection<Aeroport> getAeroport(){
      return aeros;
   }

   public void setAero(Collection<Aeroport> aeros){
      for(Aeroport a : this.aeros){
         a.setVilleWithoutBi(null);
      }

      this.aeros=aeros;
      if(this.aeros != null){
         for(Aeroport a : this.aeros){
            a.setVilleWithoutBi(this);
         }
      }

   }

   public void addAero(Aeroport aero){
      aero.setVilleWithoutBi(this);
      this.aeros.add(aero);
   }

   public void removeAero(Aeroport aero){
      aero.setVilleWithoutBi(null);
      this.aeros.remove(aero);
   }

   //BIDIRECTION

   protected void setAeroWithoutBi(Collection<Aeroport> aeros){
      this.aeros=aeros;
   }

   protected void addAeroWithoutBi(Aeroport aero){
      this.aeros.add(aero);
   }

   protected void removeAeroWithoutBi(Aeroport aero){
      this.aeros.remove(aero);
   }



}
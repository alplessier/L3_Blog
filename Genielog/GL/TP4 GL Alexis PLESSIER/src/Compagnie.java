package gestionvol;

import java.util.ArrayList;
import java.util.Collection;

/*******************/
/* Alexis PLESSIER */
/*******************/

public class Compagnie{

   private String compagnie;
   private Collection<Vol> vols = new ArrayList<>();

   //BUILDER
   public Compagnie(){

   }


   //GETTERS SETTERS
   public String getNomCompagnie(){
      return compagnie;
   }

   public void setNomCompagnie(String compagnie){
      this.compagnie=compagnie;
   }

   public Collection<Vol> getVols(){
      return vols;
   }

   public void setVols(Collection<Vol> vols){
      for(Vol v : this.vols){
         v.setCompagnieWithoutBi(null);
      }

      this.vols = vols;

      if(this.vols != null){
         for(Vol v : this.vols){
            v.setCompagnieWithoutBi(this);
         }
      }
   }

   public void addVol(Vol vol){
      vol.setCompagnieWithoutBi(this);
      this.vols.add(vol);
   }

   public void removeVol(Vol vol){
      vol.setCompagnieWithoutBi(null);
      this.vols.remove(vol);
   }

   //BIDIRECTION

   protected void setVolsWithoutBi(Collection<Vol> vols){
      this.vols=vols;
   }

   protected void addVolWithoutBi(Vol vol){
      this.vols.add(vol);
   }

   protected void removeVolWithoutBi(Vol vol){
      this.vols.remove(vol);
   }
}
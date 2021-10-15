package gestionvol;

/*******************/
/* Alexis PLESSIER */
/*******************/

public class Aeroport{


   private String nomAeroport;
   private Ville ville;

   //BUILDER
   public Aeroport(){

   }


   //GETTERS SETTERS
   public String getNomAeroport(){
      return nomAeroport;
   }

   public void setNomAeroport(String nomAeroport){
      this.nomAeroport=nomAeroport;
   }

   public Ville getVille(){
      return ville;
   }

   public void setVille(Ville ville){
      if(ville != null){
         ville.addAeroWithoutBi(this);
      }
      if(this.ville != null){
         this.ville.removeAeroWithoutBi(this);
      }
      this.ville = ville;
   }

   //BIDIRECTION

   protected void setVilleWithoutBi(Ville ville){
      this.ville = ville;
   }


   @Override
   public boolean equals(Object obj){
      try {
         return ((Aeroport) obj).getNomAeroport().equals(this.nomAeroport);
      } catch (Exception e) {
         return false;
      }
   }
}
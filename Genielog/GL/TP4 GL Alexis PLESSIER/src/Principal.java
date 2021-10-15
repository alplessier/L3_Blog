package main;

import reservation.*;
import gestionvol.*;
import java.text.SimpleDateFormat;
import java.util.Date;

/*******************/
/* Alexis PLESSIER */
/*******************/


public class Principal{

   public static void main(String[] args){


      //TEST AEROPORTS-VILLE
      Ville vi = new Ville();
      vi.setNomVille("Nevers");

      Aeroport ae = new Aeroport();
      ae.setNomAeroport("NEVERS-FOURCHAMBAULT");

      Aeroport ae1 = new Aeroport();
      ae1.setNomAeroport("NEVERS 2");

      vi.addAero(ae);
      vi.addAero(ae1);


      for(Aeroport a : vi.getAeroport()){
         System.out.println(a.getNomAeroport());
      }

      //
      System.out.println();
      //

      //TEST VOLS-COMPAGNIE

      Vol vol1 = new Vol();
      vol1.setNumeroVol("AAA1");

      Vol vol2 = new Vol();
      vol2.setNumeroVol("AAA1");

      Compagnie compagnie = new Compagnie();
      compagnie.setNomCompagnie("Air France");
      compagnie.addVol(vol1);
      compagnie.addVol(vol2);

      for(Vol vo : compagnie.getVols()){
         System.out.println(vo.getNumeroVol());
      }

      System.out.println(vol1.getCompagnie().getNomCompagnie());
      System.out.println(vol2.getCompagnie().getNomCompagnie());

      vol2.setCompagnie(null);
      System.out.println(vol2.getCompagnie());

      for(Vol vo : compagnie.getVols()){
         System.out.println(vo.getNumeroVol());
      }

      //
      System.out.println();
      //

      //TEST RESERVATION-CLIENT

      Reservation r = new Reservation();
      r.setNumResa("8888");

      Reservation r1 = new Reservation();
      r1.setNumResa("9999");

      Clients cl1 = new Clients();
      cl1.setRef("ABC123");

      cl1.addResa(r);
      cl1.addResa(r1);
      
      for(Reservation re : cl1.getResa()){
         System.out.println(re.getNumResa());
      }

      //
      System.out.println();
      //

      //TEST DATES-DUREE

      Vol vol = new Vol();

      vol.setDateDepart("25/10/2020 18:10");
      vol.setDateArrivee("26/10/2020 8:55");

      System.out.println(vol.getDateDepart());
      System.out.println(vol.getDateArrivee());
      System.out.println(vol.getDuree().toString().substring(2));




   }



}
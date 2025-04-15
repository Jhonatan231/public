import java.util.Scanner;

public class EjercicioHastaWhile {
    public static void main(String[] args) {
        Scanner ingreso = new Scanner(System.in);

        int contador = 1;
        int NumUser;
        int niño = 0;
        int adolescente = 0;
        int adulto = 0;

        System.out.println("Ingresa el numero de usuarios que deseas agregar: ");
        NumUser = ingreso.nextInt();

        while (contador <= NumUser) {
            ingreso.nextLine();

            System.out.println("Ingresa el nombre: ");
            String nombre = ingreso.nextLine();
            System.out.println("Ingresa la edad: ");
            int edad = ingreso.nextInt();
            
            System.out.println("Id: "+ contador + " nombre: "+nombre+" edad: "+edad);
    
            //veamos el rango de edad
            if (edad <= 10 ) {
                System.out.println(nombre+" es un niño.");
                niño++; 
            } else if (edad <= 18) {
                System.out.println(nombre + " Es un Adolescente.");
                adolescente++;
            }else{
            System.out.println(nombre+" es un adulto.");
            adulto++;
            }
            contador++; 
    
        }
        System.out.println("En resumen hay "+niño +" niños " +adolescente+ " adolescentes " +adulto+ " adultos.");           
        ingreso.close();
    }
}    


import java.util.Scanner; // importa escaner para leer

public class EjercicioVariables {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in); // se crea el escaner
        
        System.out.println("Ingresa tu nombre: ");
            String nombre = scanner.nextLine(); // Lee una linea de texto;

        System.out.println("Ingresa tu altura en metros: ");
            double altura = scanner.nextDouble(); // lectura de double

        //Limpiando el buffer para evitar problemas con el siguiente nextline()
        scanner.nextLine(); //Limpia el salto de linea que habia quedado en cache.


        System.out.println("Ingresa tu edad:");
            int edad = scanner.nextInt(); //leer un int
            
        
            
        //salida
        System.out.println("\nHola, " + nombre + " Tienes " + edad + " años y mides " + altura + "metros");
     
        //cerrando escanner
        scanner.close();

    }
}

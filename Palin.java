import java.util.*;
import java.util.Scanner;
class Palin
{
    public void palindrom(int n){
        int sum=0,remainder;
        int temp = n;
         while(n>0){
         remainder = n%10;
         sum = (sum*10)+remainder;
         n = n/10;

        }
        if(temp == sum){
            System.out.println("It is palindrom number is: " +sum);
        
        }else{
            System.out.println("it is not palidrrome number: " +sum);
        }
    
    }
    public static void main(String ... args)
    {
        Scanner sc = new Scanner(System.in);
        int n = sc.nextInt();
        Palin pall = new Palin();
    pall.palindrom(n);
    
        
    }
}
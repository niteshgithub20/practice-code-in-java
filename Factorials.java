import java.util.*;
import java.util.Scanner;
class Factorials
{
    public static void main(String[] args){
        System.out.println("Enter the number to find the factorial: ");
        Scanner sc = new Scanner(System.in);
        int num = sc.nextInt();
        int i=1,fact=1;
        while(i<=num)
        {
            fact=fact*i;
            i++;
        }
        System.out.println("The factorial number is :  " +fact);
    }
}






import java.util.*;
import java.util.Scanner;
public class EvenOddInvalid
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int num = sc.nextInt();
        if(num>=0)
        {
            if(num%2 == 0)
            {
                System.out.println("Even");
            }else{
                System.out.println("Odd");
            }
        }
        else
        {
            System.out.println("Invalid");

        }
    }
}
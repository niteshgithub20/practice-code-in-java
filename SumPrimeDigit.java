import java.util.*;
import java.util.Scanner;
public class SumPrimeDigit
{
    public static void main(String[] args){
        Scanner sc= new Scanner(System.in);
        int num,sum=0,digit;
        num = sc.nextInt()
        while(num!=0)
        {
            digit = num%10;
            if(digit == 2 || digit == 3 || digit == 5 || digit == 7)
            {
                sum = sum + digit;
            }
            num = num/10;
        }
        System.out.println("The sum of Prime digits are: "+sum);
    }
}
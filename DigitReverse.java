import java.util.*;
import java.util.Scanner;
public class DigitReverse
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int num,digit,rev=0;
        num = sc.nextInt();
        while(num>0)
        {
            digit = num%10;
            rev = rev*10+digit;
            num = num/10;
        }
        System.out.println("The reverse number is : "+rev);
    }
}
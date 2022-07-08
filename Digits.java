import java.util.*;
import java.util.Scanner;
public class Digits
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int num,abtakkadigit,sum=0 ;
        num = sc.nextInt();
        while(num!=0)
        {
            abtakkadigit = num%10;
            sum = sum+abtakkadigit;
            num = num/10;
        }
        System.out.println("The sum of given number is : "+sum);
    }
}
import java.util.*;
import java.util.Scanner;
public class SumOddDigit
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int num,sum=0,abtakkadigit;
        num = sc.nextInt();
        while(num!=0)
        {
            abtakkadigit = num%10;
            if(abtakkadigit%2 != 0)
            {
                sum = sum + abtakkadigit;
            }
            num = num/10;
        }
        System.out.println("The sum of odd digits: "+sum);
    }
}
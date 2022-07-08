import java.util.*;
import java.util.Scanner;
class swapbit
{
    public static void main(String[] args)
    {
        Scanner sc = new Scanner(System.in);
        int num1 = sc.nextInt();
        int num2 = sc.nextInt();
        System.out.println("the bits are :"+twobits(num1,num2));
    }
    public void twobits(int n1,int n2)
    {
        int n =0;
        n ^= 1 << n1;
        n ^= 1 << n2;
        return n;
    }
}
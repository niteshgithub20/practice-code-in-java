import java.util.*;
import java.util.Scanner;
public class Contains 
{
	static int space(int n, int[] ar) {
		HashSet<Integer> set = new HashSet<Integer>();
		int count = 0;
		for (int i = 0; i < n; i++) {
			int element = ar[i];
			if (set.contains(element)) {
				set.remove(element);
				count++;
			} else {
				set.add(element);
			}
		}
		return count;
	}
    public static void main(String[] args)
    {
       Scanner sc = new Scanner(System.in);
       int n = sc.nextInt();
       int nu = sc.nextInt();
       int[]  ar = new int[nu];
       
       System.out.println(space(n,ar));
    sc.close();
    }
}